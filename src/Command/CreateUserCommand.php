<?php


namespace App\Command;


use App\Domain\Models\User;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Closure;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class CreateUserCommand extends Command
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var EncoderFactoryInterface
     */
    private $passwordFactory;

    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * CreateUserCommand constructor.
     *
     * @param UserRepositoryInterface $userRepository
     * @param EncoderFactoryInterface $passwordFactory
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        EncoderFactoryInterface $passwordFactory,
        SlugHelperInterface $slugHelper
    ) {
        $this->userRepository = $userRepository;
        $this->passwordFactory = $passwordFactory;
        $this->slugHelper = $slugHelper;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Création d\'un utilisateur admin')
            ->setHelp('Cette commande est utilisée pour créer un nouvel admnistrateur')
            ->addArgument('username', InputArgument::REQUIRED, 'Login')
            ->addArgument('email', InputArgument::REQUIRED, 'email')
            ->addArgument('password', InputArgument::REQUIRED, 'password');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $encoder = $this->passwordFactory->getEncoder(User::class);

        $callable = Closure::fromCallable([$encoder, 'encodePassword']);

        $user = new User(
            $input->getArgument('username'),
            $input->getArgument('username'),
            $input->getArgument('password'),
            $callable,
            'ROLE_ADMIN',
            $input->getArgument('email'),
            true,
            $this->slugHelper->replace($input->getArgument('username'))
        );

        $this->userRepository->save($user);

        $output->writeln('Nouveau administrateur créé');
    }
}