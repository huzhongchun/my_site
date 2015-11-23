<?php
if (!defined('IN_DISCUZ')) {
    exit('Aecsse Denied');
}
class table_hjtp_votes extends discuz_table{
    public function __construct() {
        $this->_table = 'hjtp_votes';
        $this->_pk = 'id';
        parent::__construct();
    }

    public function fetch_all(){
         return DB::fetch_all('select * from %t where is_sh<2 order by id desc',array($this->_table));
    }
    public function fetch_limit($start,$count){
         return DB::fetch_all('select * from %t where is_sh<2 order by id desc limit %d,%d',array($this->_table,$start,$count));
    }

	
    public function fetch_by_id($id){
         return DB::fetch_first('select * from %t where id=%d',array($this->_table,$id));
    }
    public function fetch_bya_id($id){
         return DB::fetch_first('select * from %t where id=%d and is_sh<2',array($this->_table,$id));
    }
    public function fetch_all_id($id){
		 $num = rand(3,10);
		 $data = array(
		 	'is_sh'=> intval($num),
		 );
         return DB::update($this->_table,$data,'id='.$id);	 
    }
	
    public function update_by_id($id,$data){
         return DB::update($this->_table,$data,'id='.$id);	 
    }

    public function delete_by_id($id){
         return DB::delete($this->_table,'id='.$id);
    }
    public function fetcha_by_id($id){
         return DB::delete($this->_table,'id='.$id);
    }
    public function up_by_id($id){
         return DB::delete($this->_table,'id='.$id);	 
    }
    public function insert($data){
         return DB::insert($this->_table,$data);
    }



}
?>