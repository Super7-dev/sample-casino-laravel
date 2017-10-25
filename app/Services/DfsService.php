<?php
namespace App\Services;

class DfsService extends BaseService{

    public function deposit($amount , $user) {
        $res = $this->setSession($this->generateValidAccount($user));
        if ($res['status_code'] == 201) {
            $userId = $res['result']['userId'];
            $postDeposit = $this->post('/products/dfs',$this->generateDepositFormat($userId, $amount));
            
            return $postDeposit['status_code'] == 201 ? 'success':'error';
        } else {
            return 'error';
        }

    }

    public function generateDepositFormat($userId = 0, $amount = 0, $action = 'DEPOSIT',
        $currency = 'CNY')
    {
        $date = date_create();
        $transaction = [
            'transactionNumber' =>  date_format($date, 'U'),
            'action' => $action,
            'currency' => $currency,
            'amount' => $amount,
            'userId' => $userId
        ];

        return $transaction;
    }
    public function generateValidAccount($user) {
        $userLogin = [
            'username' => $user->username,
            'logoutUrl' => 'http://localhost:8000/game'
        ];
        
        return $userLogin;
    }
    public function play($user) {
       $res = $this->setSession($this->generateValidAccount($user));
       if ($res['status_code'] == 201) {
            $result = $res['result'];
            return '  <script>
                        window.location.href = "'.$res['result']['loginUrl'].'";
                    </script>
            ';
        } else {
            return $res;
        }
    }

    public function withdraw() {

    }

    public function setSession($user) {    
        return $this->post('/sessions', $user);
    }
    public function balanceInquiry($user, $currency) {
        $res = $this->setSession($this->generateValidAccount($user));
        if($res['status_code'] == 201) {
            $userId = $res['result']['userId'];
            // $params = $userId , $currency;
            $currency = $currency == '' ? 'CNY':$currency;
            return $this->getBalance($userId, $currency);
        }
    }

    public function getBalance($userId, $currency) {
        // return $this->get('/users/'.$userId.'/accounts/'.$currency);
        $res = $this->get('/users/'.$userId.'/accounts/'.$currency);
        return $res['status_code'] == 200 ? $res['result']:0;
    }

}