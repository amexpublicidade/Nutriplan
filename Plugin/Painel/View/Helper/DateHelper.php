<?PHP
class DateHelper extends AppHelper {
    
    //public $week;
    //public $date;
    //public $month;
    
    public function __construct(View $view, $settings=array()) {
        parent::__construct($view,$settings);
    }
    
    public function month($month=NULL){
        $month=(isset($month))?$month:date('m');
        switch($month) {
                case '01': $mes = 'Janeiro'; break;
                case '02': $mes = 'Fevereiro'; break;
                case '03': $mes = 'Março'; break;
                case '04': $mes = 'Abril'; break;
                case '05': $mes = 'Maio'; break;
                case '06': $mes = 'Junho'; break;
                case '07': $mes = 'Julho'; break;
                case '08': $mes = 'Agosto'; break;
                case '09': $mes = 'Setembro'; break;
                case '10': $mes = 'Outubro'; break;
                case '11': $mes = 'Novembro'; break;
                case '12': $mes = 'Dezembro'; break;
        }
        return $mes;        
    }
    
    public function weekday($date=NULL,$extense=false){
        if(isset($date)){
            $year=substr("$data", 0, 4);
            $month=substr("$data", 5, -3);
            $day=substr("$data", 8, 9);
            $date = date("w", mktime(0,0,0,$month,$day,$year));
        }else{
            $date=date("w");
        }
        switch($date){
            case '0': $dia = 'Domingo'; break;
            case '1': $dia = ($extense==true)?'Segunda-feira':'Segunda'; break;
            case '2': $dia = ($extense==true)?'Terça-feira':'Terça'; break;
            case '3': $dia = ($extense==true)?'Quarta-feira':'Quarta'; break;
            case '4': $dia = ($extense==true)?'Quinta-feira':'Quinta'; break;
            case '5': $dia = ($extense==true)?'Sexta-feira':'Sexta'; break;
            case '6': $dia = 'Sábado'; break;
        }
        return $dia;
    }
    
    public function saudation(){
        return $this->weekday(NULL,true).",". date('d') ." de ".$this->month(NULL)." de ".date('Y');
        
    }
    
}