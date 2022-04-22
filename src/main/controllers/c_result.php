<?php
/**
 * 
 */
class Result extends SessionController
{
    /**
     * 
     */
    public function __construct()
    {
        parent::__construct();
        error_log('RESULT:: Result created');
    }

    function render(){
        $this->view->render('result', []);
    }

    function verifySearch()
    {
        error_log('RESULT:: Verify Search');

        if ($this->existGET('search')) {

            $search_raw = $this->getGET('search');

            if ($search_raw == '' || empty($search_raw)) {
                $this->redirect('main', ['error' => ErrorMessages::ERROR_SEARCH_VERIFY_EMPTY]);
            }

            $search_words = trim($this->getGET('search'), ' ');

            // $this->search($search_words);
            $this->redirect('result', []);
        }

        print_r($_GET);
    }

    private function search($search_words)
    {
        foreach ($search_words as $word) {
            $res = $this->model->get($word);

            print_r($res, true);

        }

        //$this->redirect('result', []);
    }
}
?>