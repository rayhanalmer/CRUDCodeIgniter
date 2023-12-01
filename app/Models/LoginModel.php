<?php namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{
      protected $table = "user";
      protected $primaryKey = "user_id";
      protected $returnType = "object";
      protected $useTimestamps = true;
      protected $allowedFields = ['user_id', 'user_name','user_email','user_pass'];

	public function get_data($email, $password)
	{
            return $this->db->table('user')
            ->where(array('user_email' => $email, 'user_pass' => $password))
            ->get()->getRowArray();
	}

      public function dataUser($email,$password){
            $where="user_email='".$email." and user_pass='".$password."'";
            $builder = $this->db->table('user');
            $builder->select('*')->where($where);
            return $builder->get();
      }

}