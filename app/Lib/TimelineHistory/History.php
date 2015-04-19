<?php namespace App\Lib\TimelineHistory;


class History {
    /**
     * @var HistoryRepository
     */
    private $repository;

    public function __construct(HistoryRepository $repository){
        $this->repository = $repository;
        $this->repository->init();
    }

    public function repository(){
        return $this->repository;
    }
} 