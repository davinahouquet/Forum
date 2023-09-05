<?php //Tous les Managers (dossier Model) hériteront de la classe Manager (dossier App) pour bénéficier des méthodes pré-établies : findAll, findOneById, ...
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TopicManager;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }


    }