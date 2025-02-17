<?php
session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/tcausr/TcausrDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/tcausr/TcausrController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class TcausrFacade {
private $proveedor;
public function __construct() {
}
public function validarTcausr($TcausrDto){
$TcausrDto->setnombre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getnombre(),"utf8"):strtoupper($TcausrDto->getnombre()))))));
if($this->esFecha($TcausrDto->getnombre())){
$TcausrDto->setnombre($this->fechaMysql($TcausrDto->getnombre()));
}
$TcausrDto->setnom_cto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getnom_cto(),"utf8"):strtoupper($TcausrDto->getnom_cto()))))));
if($this->esFecha($TcausrDto->getnom_cto())){
$TcausrDto->setnom_cto($this->fechaMysql($TcausrDto->getnom_cto()));
}
$TcausrDto->setpwd(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getpwd(),"utf8"):strtoupper($TcausrDto->getpwd()))))));
if($this->esFecha($TcausrDto->getpwd())){
$TcausrDto->setpwd($this->fechaMysql($TcausrDto->getpwd()));
}
$TcausrDto->setcve_sql(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getcve_sql(),"utf8"):strtoupper($TcausrDto->getcve_sql()))))));
if($this->esFecha($TcausrDto->getcve_sql())){
$TcausrDto->setcve_sql($this->fechaMysql($TcausrDto->getcve_sql()));
}
$TcausrDto->setpwd_sql(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getpwd_sql(),"utf8"):strtoupper($TcausrDto->getpwd_sql()))))));
if($this->esFecha($TcausrDto->getpwd_sql())){
$TcausrDto->setpwd_sql($this->fechaMysql($TcausrDto->getpwd_sql()));
}
$TcausrDto->setnombre_lar(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getnombre_lar(),"utf8"):strtoupper($TcausrDto->getnombre_lar()))))));
if($this->esFecha($TcausrDto->getnombre_lar())){
$TcausrDto->setnombre_lar($this->fechaMysql($TcausrDto->getnombre_lar()));
}
$TcausrDto->setpuesto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getpuesto(),"utf8"):strtoupper($TcausrDto->getpuesto()))))));
if($this->esFecha($TcausrDto->getpuesto())){
$TcausrDto->setpuesto($this->fechaMysql($TcausrDto->getpuesto()));
}
$TcausrDto->setperfil(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getperfil(),"utf8"):strtoupper($TcausrDto->getperfil()))))));
if($this->esFecha($TcausrDto->getperfil())){
$TcausrDto->setperfil($this->fechaMysql($TcausrDto->getperfil()));
}
$TcausrDto->setf_ult_acc(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getf_ult_acc(),"utf8"):strtoupper($TcausrDto->getf_ult_acc()))))));
if($this->esFecha($TcausrDto->getf_ult_acc())){
$TcausrDto->setf_ult_acc($this->fechaMysql($TcausrDto->getf_ult_acc()));
}
$TcausrDto->seth_ult_acc(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->geth_ult_acc(),"utf8"):strtoupper($TcausrDto->geth_ult_acc()))))));
if($this->esFecha($TcausrDto->geth_ult_acc())){
$TcausrDto->seth_ult_acc($this->fechaMysql($TcausrDto->geth_ult_acc()));
}
$TcausrDto->setf_alt(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getf_alt(),"utf8"):strtoupper($TcausrDto->getf_alt()))))));
if($this->esFecha($TcausrDto->getf_alt())){
$TcausrDto->setf_alt($this->fechaMysql($TcausrDto->getf_alt()));
}
$TcausrDto->seth_alt(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->geth_alt(),"utf8"):strtoupper($TcausrDto->geth_alt()))))));
if($this->esFecha($TcausrDto->geth_alt())){
$TcausrDto->seth_alt($this->fechaMysql($TcausrDto->geth_alt()));
}
$TcausrDto->setu_alt(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getu_alt(),"utf8"):strtoupper($TcausrDto->getu_alt()))))));
if($this->esFecha($TcausrDto->getu_alt())){
$TcausrDto->setu_alt($this->fechaMysql($TcausrDto->getu_alt()));
}
$TcausrDto->setf_mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getf_mod(),"utf8"):strtoupper($TcausrDto->getf_mod()))))));
if($this->esFecha($TcausrDto->getf_mod())){
$TcausrDto->setf_mod($this->fechaMysql($TcausrDto->getf_mod()));
}
$TcausrDto->seth_mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->geth_mod(),"utf8"):strtoupper($TcausrDto->geth_mod()))))));
if($this->esFecha($TcausrDto->geth_mod())){
$TcausrDto->seth_mod($this->fechaMysql($TcausrDto->geth_mod()));
}
$TcausrDto->setu_mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getu_mod(),"utf8"):strtoupper($TcausrDto->getu_mod()))))));
if($this->esFecha($TcausrDto->getu_mod())){
$TcausrDto->setu_mod($this->fechaMysql($TcausrDto->getu_mod()));
}
$TcausrDto->setacceso_0(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_0(),"utf8"):strtoupper($TcausrDto->getacceso_0()))))));
if($this->esFecha($TcausrDto->getacceso_0())){
$TcausrDto->setacceso_0($this->fechaMysql($TcausrDto->getacceso_0()));
}
$TcausrDto->setacceso_1(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_1(),"utf8"):strtoupper($TcausrDto->getacceso_1()))))));
if($this->esFecha($TcausrDto->getacceso_1())){
$TcausrDto->setacceso_1($this->fechaMysql($TcausrDto->getacceso_1()));
}
$TcausrDto->setacceso_2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_2(),"utf8"):strtoupper($TcausrDto->getacceso_2()))))));
if($this->esFecha($TcausrDto->getacceso_2())){
$TcausrDto->setacceso_2($this->fechaMysql($TcausrDto->getacceso_2()));
}
$TcausrDto->setacceso_3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_3(),"utf8"):strtoupper($TcausrDto->getacceso_3()))))));
if($this->esFecha($TcausrDto->getacceso_3())){
$TcausrDto->setacceso_3($this->fechaMysql($TcausrDto->getacceso_3()));
}
$TcausrDto->setacceso_4(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_4(),"utf8"):strtoupper($TcausrDto->getacceso_4()))))));
if($this->esFecha($TcausrDto->getacceso_4())){
$TcausrDto->setacceso_4($this->fechaMysql($TcausrDto->getacceso_4()));
}
$TcausrDto->setacceso_5(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_5(),"utf8"):strtoupper($TcausrDto->getacceso_5()))))));
if($this->esFecha($TcausrDto->getacceso_5())){
$TcausrDto->setacceso_5($this->fechaMysql($TcausrDto->getacceso_5()));
}
$TcausrDto->setacceso_6(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_6(),"utf8"):strtoupper($TcausrDto->getacceso_6()))))));
if($this->esFecha($TcausrDto->getacceso_6())){
$TcausrDto->setacceso_6($this->fechaMysql($TcausrDto->getacceso_6()));
}
$TcausrDto->setacceso_7(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_7(),"utf8"):strtoupper($TcausrDto->getacceso_7()))))));
if($this->esFecha($TcausrDto->getacceso_7())){
$TcausrDto->setacceso_7($this->fechaMysql($TcausrDto->getacceso_7()));
}
$TcausrDto->setacceso_8(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_8(),"utf8"):strtoupper($TcausrDto->getacceso_8()))))));
if($this->esFecha($TcausrDto->getacceso_8())){
$TcausrDto->setacceso_8($this->fechaMysql($TcausrDto->getacceso_8()));
}
$TcausrDto->setacceso_9(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_9(),"utf8"):strtoupper($TcausrDto->getacceso_9()))))));
if($this->esFecha($TcausrDto->getacceso_9())){
$TcausrDto->setacceso_9($this->fechaMysql($TcausrDto->getacceso_9()));
}
$TcausrDto->setacceso_10(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_10(),"utf8"):strtoupper($TcausrDto->getacceso_10()))))));
if($this->esFecha($TcausrDto->getacceso_10())){
$TcausrDto->setacceso_10($this->fechaMysql($TcausrDto->getacceso_10()));
}
$TcausrDto->setacceso_11(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_11(),"utf8"):strtoupper($TcausrDto->getacceso_11()))))));
if($this->esFecha($TcausrDto->getacceso_11())){
$TcausrDto->setacceso_11($this->fechaMysql($TcausrDto->getacceso_11()));
}
$TcausrDto->setacceso_12(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_12(),"utf8"):strtoupper($TcausrDto->getacceso_12()))))));
if($this->esFecha($TcausrDto->getacceso_12())){
$TcausrDto->setacceso_12($this->fechaMysql($TcausrDto->getacceso_12()));
}
$TcausrDto->setacceso_13(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_13(),"utf8"):strtoupper($TcausrDto->getacceso_13()))))));
if($this->esFecha($TcausrDto->getacceso_13())){
$TcausrDto->setacceso_13($this->fechaMysql($TcausrDto->getacceso_13()));
}
$TcausrDto->setacceso_14(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_14(),"utf8"):strtoupper($TcausrDto->getacceso_14()))))));
if($this->esFecha($TcausrDto->getacceso_14())){
$TcausrDto->setacceso_14($this->fechaMysql($TcausrDto->getacceso_14()));
}
$TcausrDto->setacceso_15(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_15(),"utf8"):strtoupper($TcausrDto->getacceso_15()))))));
if($this->esFecha($TcausrDto->getacceso_15())){
$TcausrDto->setacceso_15($this->fechaMysql($TcausrDto->getacceso_15()));
}
$TcausrDto->setacceso_16(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_16(),"utf8"):strtoupper($TcausrDto->getacceso_16()))))));
if($this->esFecha($TcausrDto->getacceso_16())){
$TcausrDto->setacceso_16($this->fechaMysql($TcausrDto->getacceso_16()));
}
$TcausrDto->setacceso_17(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_17(),"utf8"):strtoupper($TcausrDto->getacceso_17()))))));
if($this->esFecha($TcausrDto->getacceso_17())){
$TcausrDto->setacceso_17($this->fechaMysql($TcausrDto->getacceso_17()));
}
$TcausrDto->setacceso_18(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_18(),"utf8"):strtoupper($TcausrDto->getacceso_18()))))));
if($this->esFecha($TcausrDto->getacceso_18())){
$TcausrDto->setacceso_18($this->fechaMysql($TcausrDto->getacceso_18()));
}
$TcausrDto->setacceso_19(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_19(),"utf8"):strtoupper($TcausrDto->getacceso_19()))))));
if($this->esFecha($TcausrDto->getacceso_19())){
$TcausrDto->setacceso_19($this->fechaMysql($TcausrDto->getacceso_19()));
}
$TcausrDto->setacceso_20(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_20(),"utf8"):strtoupper($TcausrDto->getacceso_20()))))));
if($this->esFecha($TcausrDto->getacceso_20())){
$TcausrDto->setacceso_20($this->fechaMysql($TcausrDto->getacceso_20()));
}
$TcausrDto->setacceso_21(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_21(),"utf8"):strtoupper($TcausrDto->getacceso_21()))))));
if($this->esFecha($TcausrDto->getacceso_21())){
$TcausrDto->setacceso_21($this->fechaMysql($TcausrDto->getacceso_21()));
}
$TcausrDto->setacceso_22(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_22(),"utf8"):strtoupper($TcausrDto->getacceso_22()))))));
if($this->esFecha($TcausrDto->getacceso_22())){
$TcausrDto->setacceso_22($this->fechaMysql($TcausrDto->getacceso_22()));
}
$TcausrDto->setacceso_23(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_23(),"utf8"):strtoupper($TcausrDto->getacceso_23()))))));
if($this->esFecha($TcausrDto->getacceso_23())){
$TcausrDto->setacceso_23($this->fechaMysql($TcausrDto->getacceso_23()));
}
$TcausrDto->setacceso_24(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_24(),"utf8"):strtoupper($TcausrDto->getacceso_24()))))));
if($this->esFecha($TcausrDto->getacceso_24())){
$TcausrDto->setacceso_24($this->fechaMysql($TcausrDto->getacceso_24()));
}
$TcausrDto->setacceso_25(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_25(),"utf8"):strtoupper($TcausrDto->getacceso_25()))))));
if($this->esFecha($TcausrDto->getacceso_25())){
$TcausrDto->setacceso_25($this->fechaMysql($TcausrDto->getacceso_25()));
}
$TcausrDto->setacceso_26(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_26(),"utf8"):strtoupper($TcausrDto->getacceso_26()))))));
if($this->esFecha($TcausrDto->getacceso_26())){
$TcausrDto->setacceso_26($this->fechaMysql($TcausrDto->getacceso_26()));
}
$TcausrDto->setacceso_27(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_27(),"utf8"):strtoupper($TcausrDto->getacceso_27()))))));
if($this->esFecha($TcausrDto->getacceso_27())){
$TcausrDto->setacceso_27($this->fechaMysql($TcausrDto->getacceso_27()));
}
$TcausrDto->setacceso_28(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_28(),"utf8"):strtoupper($TcausrDto->getacceso_28()))))));
if($this->esFecha($TcausrDto->getacceso_28())){
$TcausrDto->setacceso_28($this->fechaMysql($TcausrDto->getacceso_28()));
}
$TcausrDto->setacceso_29(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_29(),"utf8"):strtoupper($TcausrDto->getacceso_29()))))));
if($this->esFecha($TcausrDto->getacceso_29())){
$TcausrDto->setacceso_29($this->fechaMysql($TcausrDto->getacceso_29()));
}
$TcausrDto->setacceso_30(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_30(),"utf8"):strtoupper($TcausrDto->getacceso_30()))))));
if($this->esFecha($TcausrDto->getacceso_30())){
$TcausrDto->setacceso_30($this->fechaMysql($TcausrDto->getacceso_30()));
}
$TcausrDto->setacceso_31(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_31(),"utf8"):strtoupper($TcausrDto->getacceso_31()))))));
if($this->esFecha($TcausrDto->getacceso_31())){
$TcausrDto->setacceso_31($this->fechaMysql($TcausrDto->getacceso_31()));
}
$TcausrDto->setacceso_32(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_32(),"utf8"):strtoupper($TcausrDto->getacceso_32()))))));
if($this->esFecha($TcausrDto->getacceso_32())){
$TcausrDto->setacceso_32($this->fechaMysql($TcausrDto->getacceso_32()));
}
$TcausrDto->setacceso_33(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_33(),"utf8"):strtoupper($TcausrDto->getacceso_33()))))));
if($this->esFecha($TcausrDto->getacceso_33())){
$TcausrDto->setacceso_33($this->fechaMysql($TcausrDto->getacceso_33()));
}
$TcausrDto->setacceso_34(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_34(),"utf8"):strtoupper($TcausrDto->getacceso_34()))))));
if($this->esFecha($TcausrDto->getacceso_34())){
$TcausrDto->setacceso_34($this->fechaMysql($TcausrDto->getacceso_34()));
}
$TcausrDto->setacceso_35(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_35(),"utf8"):strtoupper($TcausrDto->getacceso_35()))))));
if($this->esFecha($TcausrDto->getacceso_35())){
$TcausrDto->setacceso_35($this->fechaMysql($TcausrDto->getacceso_35()));
}
$TcausrDto->setacceso_36(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_36(),"utf8"):strtoupper($TcausrDto->getacceso_36()))))));
if($this->esFecha($TcausrDto->getacceso_36())){
$TcausrDto->setacceso_36($this->fechaMysql($TcausrDto->getacceso_36()));
}
$TcausrDto->setacceso_37(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_37(),"utf8"):strtoupper($TcausrDto->getacceso_37()))))));
if($this->esFecha($TcausrDto->getacceso_37())){
$TcausrDto->setacceso_37($this->fechaMysql($TcausrDto->getacceso_37()));
}
$TcausrDto->setacceso_38(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_38(),"utf8"):strtoupper($TcausrDto->getacceso_38()))))));
if($this->esFecha($TcausrDto->getacceso_38())){
$TcausrDto->setacceso_38($this->fechaMysql($TcausrDto->getacceso_38()));
}
$TcausrDto->setacceso_39(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_39(),"utf8"):strtoupper($TcausrDto->getacceso_39()))))));
if($this->esFecha($TcausrDto->getacceso_39())){
$TcausrDto->setacceso_39($this->fechaMysql($TcausrDto->getacceso_39()));
}
$TcausrDto->setacceso_40(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_40(),"utf8"):strtoupper($TcausrDto->getacceso_40()))))));
if($this->esFecha($TcausrDto->getacceso_40())){
$TcausrDto->setacceso_40($this->fechaMysql($TcausrDto->getacceso_40()));
}
$TcausrDto->setacceso_41(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_41(),"utf8"):strtoupper($TcausrDto->getacceso_41()))))));
if($this->esFecha($TcausrDto->getacceso_41())){
$TcausrDto->setacceso_41($this->fechaMysql($TcausrDto->getacceso_41()));
}
$TcausrDto->setacceso_42(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_42(),"utf8"):strtoupper($TcausrDto->getacceso_42()))))));
if($this->esFecha($TcausrDto->getacceso_42())){
$TcausrDto->setacceso_42($this->fechaMysql($TcausrDto->getacceso_42()));
}
$TcausrDto->setacceso_43(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_43(),"utf8"):strtoupper($TcausrDto->getacceso_43()))))));
if($this->esFecha($TcausrDto->getacceso_43())){
$TcausrDto->setacceso_43($this->fechaMysql($TcausrDto->getacceso_43()));
}
$TcausrDto->setacceso_44(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_44(),"utf8"):strtoupper($TcausrDto->getacceso_44()))))));
if($this->esFecha($TcausrDto->getacceso_44())){
$TcausrDto->setacceso_44($this->fechaMysql($TcausrDto->getacceso_44()));
}
$TcausrDto->setacceso_45(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_45(),"utf8"):strtoupper($TcausrDto->getacceso_45()))))));
if($this->esFecha($TcausrDto->getacceso_45())){
$TcausrDto->setacceso_45($this->fechaMysql($TcausrDto->getacceso_45()));
}
$TcausrDto->setacceso_46(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_46(),"utf8"):strtoupper($TcausrDto->getacceso_46()))))));
if($this->esFecha($TcausrDto->getacceso_46())){
$TcausrDto->setacceso_46($this->fechaMysql($TcausrDto->getacceso_46()));
}
$TcausrDto->setacceso_47(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_47(),"utf8"):strtoupper($TcausrDto->getacceso_47()))))));
if($this->esFecha($TcausrDto->getacceso_47())){
$TcausrDto->setacceso_47($this->fechaMysql($TcausrDto->getacceso_47()));
}
$TcausrDto->setacceso_48(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_48(),"utf8"):strtoupper($TcausrDto->getacceso_48()))))));
if($this->esFecha($TcausrDto->getacceso_48())){
$TcausrDto->setacceso_48($this->fechaMysql($TcausrDto->getacceso_48()));
}
$TcausrDto->setacceso_49(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_49(),"utf8"):strtoupper($TcausrDto->getacceso_49()))))));
if($this->esFecha($TcausrDto->getacceso_49())){
$TcausrDto->setacceso_49($this->fechaMysql($TcausrDto->getacceso_49()));
}
$TcausrDto->setacceso_50(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_50(),"utf8"):strtoupper($TcausrDto->getacceso_50()))))));
if($this->esFecha($TcausrDto->getacceso_50())){
$TcausrDto->setacceso_50($this->fechaMysql($TcausrDto->getacceso_50()));
}
$TcausrDto->setacceso_51(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_51(),"utf8"):strtoupper($TcausrDto->getacceso_51()))))));
if($this->esFecha($TcausrDto->getacceso_51())){
$TcausrDto->setacceso_51($this->fechaMysql($TcausrDto->getacceso_51()));
}
$TcausrDto->setacceso_52(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_52(),"utf8"):strtoupper($TcausrDto->getacceso_52()))))));
if($this->esFecha($TcausrDto->getacceso_52())){
$TcausrDto->setacceso_52($this->fechaMysql($TcausrDto->getacceso_52()));
}
$TcausrDto->setacceso_53(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_53(),"utf8"):strtoupper($TcausrDto->getacceso_53()))))));
if($this->esFecha($TcausrDto->getacceso_53())){
$TcausrDto->setacceso_53($this->fechaMysql($TcausrDto->getacceso_53()));
}
$TcausrDto->setacceso_54(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_54(),"utf8"):strtoupper($TcausrDto->getacceso_54()))))));
if($this->esFecha($TcausrDto->getacceso_54())){
$TcausrDto->setacceso_54($this->fechaMysql($TcausrDto->getacceso_54()));
}
$TcausrDto->setacceso_55(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_55(),"utf8"):strtoupper($TcausrDto->getacceso_55()))))));
if($this->esFecha($TcausrDto->getacceso_55())){
$TcausrDto->setacceso_55($this->fechaMysql($TcausrDto->getacceso_55()));
}
$TcausrDto->setacceso_56(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_56(),"utf8"):strtoupper($TcausrDto->getacceso_56()))))));
if($this->esFecha($TcausrDto->getacceso_56())){
$TcausrDto->setacceso_56($this->fechaMysql($TcausrDto->getacceso_56()));
}
$TcausrDto->setacceso_57(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_57(),"utf8"):strtoupper($TcausrDto->getacceso_57()))))));
if($this->esFecha($TcausrDto->getacceso_57())){
$TcausrDto->setacceso_57($this->fechaMysql($TcausrDto->getacceso_57()));
}
$TcausrDto->setacceso_58(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_58(),"utf8"):strtoupper($TcausrDto->getacceso_58()))))));
if($this->esFecha($TcausrDto->getacceso_58())){
$TcausrDto->setacceso_58($this->fechaMysql($TcausrDto->getacceso_58()));
}
$TcausrDto->setacceso_59(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_59(),"utf8"):strtoupper($TcausrDto->getacceso_59()))))));
if($this->esFecha($TcausrDto->getacceso_59())){
$TcausrDto->setacceso_59($this->fechaMysql($TcausrDto->getacceso_59()));
}
$TcausrDto->setacceso_60(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_60(),"utf8"):strtoupper($TcausrDto->getacceso_60()))))));
if($this->esFecha($TcausrDto->getacceso_60())){
$TcausrDto->setacceso_60($this->fechaMysql($TcausrDto->getacceso_60()));
}
$TcausrDto->setacceso_61(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_61(),"utf8"):strtoupper($TcausrDto->getacceso_61()))))));
if($this->esFecha($TcausrDto->getacceso_61())){
$TcausrDto->setacceso_61($this->fechaMysql($TcausrDto->getacceso_61()));
}
$TcausrDto->setacceso_62(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_62(),"utf8"):strtoupper($TcausrDto->getacceso_62()))))));
if($this->esFecha($TcausrDto->getacceso_62())){
$TcausrDto->setacceso_62($this->fechaMysql($TcausrDto->getacceso_62()));
}
$TcausrDto->setacceso_63(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_63(),"utf8"):strtoupper($TcausrDto->getacceso_63()))))));
if($this->esFecha($TcausrDto->getacceso_63())){
$TcausrDto->setacceso_63($this->fechaMysql($TcausrDto->getacceso_63()));
}
$TcausrDto->setacceso_64(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_64(),"utf8"):strtoupper($TcausrDto->getacceso_64()))))));
if($this->esFecha($TcausrDto->getacceso_64())){
$TcausrDto->setacceso_64($this->fechaMysql($TcausrDto->getacceso_64()));
}
$TcausrDto->setacceso_65(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_65(),"utf8"):strtoupper($TcausrDto->getacceso_65()))))));
if($this->esFecha($TcausrDto->getacceso_65())){
$TcausrDto->setacceso_65($this->fechaMysql($TcausrDto->getacceso_65()));
}
$TcausrDto->setacceso_66(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_66(),"utf8"):strtoupper($TcausrDto->getacceso_66()))))));
if($this->esFecha($TcausrDto->getacceso_66())){
$TcausrDto->setacceso_66($this->fechaMysql($TcausrDto->getacceso_66()));
}
$TcausrDto->setacceso_67(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_67(),"utf8"):strtoupper($TcausrDto->getacceso_67()))))));
if($this->esFecha($TcausrDto->getacceso_67())){
$TcausrDto->setacceso_67($this->fechaMysql($TcausrDto->getacceso_67()));
}
$TcausrDto->setacceso_68(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_68(),"utf8"):strtoupper($TcausrDto->getacceso_68()))))));
if($this->esFecha($TcausrDto->getacceso_68())){
$TcausrDto->setacceso_68($this->fechaMysql($TcausrDto->getacceso_68()));
}
$TcausrDto->setacceso_69(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_69(),"utf8"):strtoupper($TcausrDto->getacceso_69()))))));
if($this->esFecha($TcausrDto->getacceso_69())){
$TcausrDto->setacceso_69($this->fechaMysql($TcausrDto->getacceso_69()));
}
$TcausrDto->setacceso_70(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_70(),"utf8"):strtoupper($TcausrDto->getacceso_70()))))));
if($this->esFecha($TcausrDto->getacceso_70())){
$TcausrDto->setacceso_70($this->fechaMysql($TcausrDto->getacceso_70()));
}
$TcausrDto->setacceso_71(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_71(),"utf8"):strtoupper($TcausrDto->getacceso_71()))))));
if($this->esFecha($TcausrDto->getacceso_71())){
$TcausrDto->setacceso_71($this->fechaMysql($TcausrDto->getacceso_71()));
}
$TcausrDto->setacceso_72(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_72(),"utf8"):strtoupper($TcausrDto->getacceso_72()))))));
if($this->esFecha($TcausrDto->getacceso_72())){
$TcausrDto->setacceso_72($this->fechaMysql($TcausrDto->getacceso_72()));
}
$TcausrDto->setacceso_73(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_73(),"utf8"):strtoupper($TcausrDto->getacceso_73()))))));
if($this->esFecha($TcausrDto->getacceso_73())){
$TcausrDto->setacceso_73($this->fechaMysql($TcausrDto->getacceso_73()));
}
$TcausrDto->setacceso_74(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_74(),"utf8"):strtoupper($TcausrDto->getacceso_74()))))));
if($this->esFecha($TcausrDto->getacceso_74())){
$TcausrDto->setacceso_74($this->fechaMysql($TcausrDto->getacceso_74()));
}
$TcausrDto->setacceso_75(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_75(),"utf8"):strtoupper($TcausrDto->getacceso_75()))))));
if($this->esFecha($TcausrDto->getacceso_75())){
$TcausrDto->setacceso_75($this->fechaMysql($TcausrDto->getacceso_75()));
}
$TcausrDto->setacceso_76(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_76(),"utf8"):strtoupper($TcausrDto->getacceso_76()))))));
if($this->esFecha($TcausrDto->getacceso_76())){
$TcausrDto->setacceso_76($this->fechaMysql($TcausrDto->getacceso_76()));
}
$TcausrDto->setacceso_77(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_77(),"utf8"):strtoupper($TcausrDto->getacceso_77()))))));
if($this->esFecha($TcausrDto->getacceso_77())){
$TcausrDto->setacceso_77($this->fechaMysql($TcausrDto->getacceso_77()));
}
$TcausrDto->setacceso_78(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_78(),"utf8"):strtoupper($TcausrDto->getacceso_78()))))));
if($this->esFecha($TcausrDto->getacceso_78())){
$TcausrDto->setacceso_78($this->fechaMysql($TcausrDto->getacceso_78()));
}
$TcausrDto->setacceso_79(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getacceso_79(),"utf8"):strtoupper($TcausrDto->getacceso_79()))))));
if($this->esFecha($TcausrDto->getacceso_79())){
$TcausrDto->setacceso_79($this->fechaMysql($TcausrDto->getacceso_79()));
}
$TcausrDto->setmonto_autoriza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getmonto_autoriza(),"utf8"):strtoupper($TcausrDto->getmonto_autoriza()))))));
if($this->esFecha($TcausrDto->getmonto_autoriza())){
$TcausrDto->setmonto_autoriza($this->fechaMysql($TcausrDto->getmonto_autoriza()));
}
$TcausrDto->setproveedor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getproveedor(),"utf8"):strtoupper($TcausrDto->getproveedor()))))));
if($this->esFecha($TcausrDto->getproveedor())){
$TcausrDto->setproveedor($this->fechaMysql($TcausrDto->getproveedor()));
}
$TcausrDto->setnum_sistema(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getnum_sistema(),"utf8"):strtoupper($TcausrDto->getnum_sistema()))))));
if($this->esFecha($TcausrDto->getnum_sistema())){
$TcausrDto->setnum_sistema($this->fechaMysql($TcausrDto->getnum_sistema()));
}
$TcausrDto->setsuper_conta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getsuper_conta(),"utf8"):strtoupper($TcausrDto->getsuper_conta()))))));
if($this->esFecha($TcausrDto->getsuper_conta())){
$TcausrDto->setsuper_conta($this->fechaMysql($TcausrDto->getsuper_conta()));
}
$TcausrDto->setaut(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getaut(),"utf8"):strtoupper($TcausrDto->getaut()))))));
if($this->esFecha($TcausrDto->getaut())){
$TcausrDto->setaut($this->fechaMysql($TcausrDto->getaut()));
}
$TcausrDto->setcia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getcia(),"utf8"):strtoupper($TcausrDto->getcia()))))));
if($this->esFecha($TcausrDto->getcia())){
$TcausrDto->setcia($this->fechaMysql($TcausrDto->getcia()));
}
$TcausrDto->setdepto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdepto(),"utf8"):strtoupper($TcausrDto->getdepto()))))));
if($this->esFecha($TcausrDto->getdepto())){
$TcausrDto->setdepto($this->fechaMysql($TcausrDto->getdepto()));
}
$TcausrDto->setagente(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getagente(),"utf8"):strtoupper($TcausrDto->getagente()))))));
if($this->esFecha($TcausrDto->getagente())){
$TcausrDto->setagente($this->fechaMysql($TcausrDto->getagente()));
}
$TcausrDto->setcia_ventas(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getcia_ventas(),"utf8"):strtoupper($TcausrDto->getcia_ventas()))))));
if($this->esFecha($TcausrDto->getcia_ventas())){
$TcausrDto->setcia_ventas($this->fechaMysql($TcausrDto->getcia_ventas()));
}
$TcausrDto->setdep_acc_0(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_0(),"utf8"):strtoupper($TcausrDto->getdep_acc_0()))))));
if($this->esFecha($TcausrDto->getdep_acc_0())){
$TcausrDto->setdep_acc_0($this->fechaMysql($TcausrDto->getdep_acc_0()));
}
$TcausrDto->setdep_acc_1(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_1(),"utf8"):strtoupper($TcausrDto->getdep_acc_1()))))));
if($this->esFecha($TcausrDto->getdep_acc_1())){
$TcausrDto->setdep_acc_1($this->fechaMysql($TcausrDto->getdep_acc_1()));
}
$TcausrDto->setdep_acc_2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_2(),"utf8"):strtoupper($TcausrDto->getdep_acc_2()))))));
if($this->esFecha($TcausrDto->getdep_acc_2())){
$TcausrDto->setdep_acc_2($this->fechaMysql($TcausrDto->getdep_acc_2()));
}
$TcausrDto->setdep_acc_3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_3(),"utf8"):strtoupper($TcausrDto->getdep_acc_3()))))));
if($this->esFecha($TcausrDto->getdep_acc_3())){
$TcausrDto->setdep_acc_3($this->fechaMysql($TcausrDto->getdep_acc_3()));
}
$TcausrDto->setdep_acc_4(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_4(),"utf8"):strtoupper($TcausrDto->getdep_acc_4()))))));
if($this->esFecha($TcausrDto->getdep_acc_4())){
$TcausrDto->setdep_acc_4($this->fechaMysql($TcausrDto->getdep_acc_4()));
}
$TcausrDto->setdep_acc_5(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_5(),"utf8"):strtoupper($TcausrDto->getdep_acc_5()))))));
if($this->esFecha($TcausrDto->getdep_acc_5())){
$TcausrDto->setdep_acc_5($this->fechaMysql($TcausrDto->getdep_acc_5()));
}
$TcausrDto->setdep_acc_6(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_6(),"utf8"):strtoupper($TcausrDto->getdep_acc_6()))))));
if($this->esFecha($TcausrDto->getdep_acc_6())){
$TcausrDto->setdep_acc_6($this->fechaMysql($TcausrDto->getdep_acc_6()));
}
$TcausrDto->setdep_acc_7(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_7(),"utf8"):strtoupper($TcausrDto->getdep_acc_7()))))));
if($this->esFecha($TcausrDto->getdep_acc_7())){
$TcausrDto->setdep_acc_7($this->fechaMysql($TcausrDto->getdep_acc_7()));
}
$TcausrDto->setdep_acc_8(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_8(),"utf8"):strtoupper($TcausrDto->getdep_acc_8()))))));
if($this->esFecha($TcausrDto->getdep_acc_8())){
$TcausrDto->setdep_acc_8($this->fechaMysql($TcausrDto->getdep_acc_8()));
}
$TcausrDto->setdep_acc_9(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_9(),"utf8"):strtoupper($TcausrDto->getdep_acc_9()))))));
if($this->esFecha($TcausrDto->getdep_acc_9())){
$TcausrDto->setdep_acc_9($this->fechaMysql($TcausrDto->getdep_acc_9()));
}
$TcausrDto->setdep_acc_10(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_10(),"utf8"):strtoupper($TcausrDto->getdep_acc_10()))))));
if($this->esFecha($TcausrDto->getdep_acc_10())){
$TcausrDto->setdep_acc_10($this->fechaMysql($TcausrDto->getdep_acc_10()));
}
$TcausrDto->setdep_acc_11(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_11(),"utf8"):strtoupper($TcausrDto->getdep_acc_11()))))));
if($this->esFecha($TcausrDto->getdep_acc_11())){
$TcausrDto->setdep_acc_11($this->fechaMysql($TcausrDto->getdep_acc_11()));
}
$TcausrDto->setdep_acc_12(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_12(),"utf8"):strtoupper($TcausrDto->getdep_acc_12()))))));
if($this->esFecha($TcausrDto->getdep_acc_12())){
$TcausrDto->setdep_acc_12($this->fechaMysql($TcausrDto->getdep_acc_12()));
}
$TcausrDto->setdep_acc_13(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_13(),"utf8"):strtoupper($TcausrDto->getdep_acc_13()))))));
if($this->esFecha($TcausrDto->getdep_acc_13())){
$TcausrDto->setdep_acc_13($this->fechaMysql($TcausrDto->getdep_acc_13()));
}
$TcausrDto->setdep_acc_14(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_14(),"utf8"):strtoupper($TcausrDto->getdep_acc_14()))))));
if($this->esFecha($TcausrDto->getdep_acc_14())){
$TcausrDto->setdep_acc_14($this->fechaMysql($TcausrDto->getdep_acc_14()));
}
$TcausrDto->setdep_acc_15(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_15(),"utf8"):strtoupper($TcausrDto->getdep_acc_15()))))));
if($this->esFecha($TcausrDto->getdep_acc_15())){
$TcausrDto->setdep_acc_15($this->fechaMysql($TcausrDto->getdep_acc_15()));
}
$TcausrDto->setdep_acc_16(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_16(),"utf8"):strtoupper($TcausrDto->getdep_acc_16()))))));
if($this->esFecha($TcausrDto->getdep_acc_16())){
$TcausrDto->setdep_acc_16($this->fechaMysql($TcausrDto->getdep_acc_16()));
}
$TcausrDto->setdep_acc_17(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_17(),"utf8"):strtoupper($TcausrDto->getdep_acc_17()))))));
if($this->esFecha($TcausrDto->getdep_acc_17())){
$TcausrDto->setdep_acc_17($this->fechaMysql($TcausrDto->getdep_acc_17()));
}
$TcausrDto->setdep_acc_18(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_18(),"utf8"):strtoupper($TcausrDto->getdep_acc_18()))))));
if($this->esFecha($TcausrDto->getdep_acc_18())){
$TcausrDto->setdep_acc_18($this->fechaMysql($TcausrDto->getdep_acc_18()));
}
$TcausrDto->setdep_acc_19(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TcausrDto->getdep_acc_19(),"utf8"):strtoupper($TcausrDto->getdep_acc_19()))))));
if($this->esFecha($TcausrDto->getdep_acc_19())){
$TcausrDto->setdep_acc_19($this->fechaMysql($TcausrDto->getdep_acc_19()));
}
return $TcausrDto;
}
public function selectTcausr($TcausrDto){
$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrController = new TcausrController();
$TcausrDto = $TcausrController->selectTcausr($TcausrDto);
if($TcausrDto!=""){
$dtoToJson = new DtoToJson($TcausrDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertTcausr($TcausrDto){
//$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrController = new TcausrController();
$TcausrDto = $TcausrController->insertTcausr($TcausrDto);
if($TcausrDto!=""){
$dtoToJson = new DtoToJson($TcausrDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateTcausr($TcausrDto){
//$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrController = new TcausrController();
$TcausrDto = $TcausrController->updateTcausr($TcausrDto);
if($TcausrDto!=""){
$dtoToJson = new DtoToJson($TcausrDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteTcausr($TcausrDto){
//$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrController = new TcausrController();
$TcausrDto = $TcausrController->deleteTcausr($TcausrDto);
if($TcausrDto==true){
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"REGISTRO ELIMINADO DE FORMA CORRECTA"));
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL LA BAJA"));
}
private function esFecha($fecha) {
if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $fecha)) {
return true;
}
return false;
}
private function esFechaMysql($fecha) {
if (preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $fecha)) {
return true;
}
return false;
}
private function fechaMysql($fecha) {
list($dia, $mes, $year) = explode("/", $fecha);
return $year . "-" . $mes . "-" . $dia;
}
private function fechaNormal($fecha) {
list($dia, $mes, $year) = explode("/", $fecha);
return $year . "-" . $mes . "-" . $dia;
}
}


@$numero_empleado=$_POST["numero_empleado"];
@$nombre=$_POST["nombre"];
@$nom_cto=$_POST["nom_cto"];
@$pwd=$_POST["pwd"];
@$cve_sql=$_POST["cve_sql"];
@$pwd_sql=$_POST["pwd_sql"];
@$nombre_lar=$_POST["nombre_lar"];
@$puesto=$_POST["puesto"];
@$perfil=$_POST["perfil"];
@$f_ult_acc=$_POST["f_ult_acc"];
@$h_ult_acc=$_POST["h_ult_acc"];
@$f_alt=$_POST["f_alt"];
@$h_alt=$_POST["h_alt"];
@$u_alt=$_POST["u_alt"];
@$f_mod=$_POST["f_mod"];
@$h_mod=$_POST["h_mod"];
@$u_mod=$_POST["u_mod"];
@$acceso_0=$_POST["acceso_0"];
@$acceso_1=$_POST["acceso_1"];
@$acceso_2=$_POST["acceso_2"];
@$acceso_3=$_POST["acceso_3"];
@$acceso_4=$_POST["acceso_4"];
@$acceso_5=$_POST["acceso_5"];
@$acceso_6=$_POST["acceso_6"];
@$acceso_7=$_POST["acceso_7"];
@$acceso_8=$_POST["acceso_8"];
@$acceso_9=$_POST["acceso_9"];
@$acceso_10=$_POST["acceso_10"];
@$acceso_11=$_POST["acceso_11"];
@$acceso_12=$_POST["acceso_12"];
@$acceso_13=$_POST["acceso_13"];
@$acceso_14=$_POST["acceso_14"];
@$acceso_15=$_POST["acceso_15"];
@$acceso_16=$_POST["acceso_16"];
@$acceso_17=$_POST["acceso_17"];
@$acceso_18=$_POST["acceso_18"];
@$acceso_19=$_POST["acceso_19"];
@$acceso_20=$_POST["acceso_20"];
@$acceso_21=$_POST["acceso_21"];
@$acceso_22=$_POST["acceso_22"];
@$acceso_23=$_POST["acceso_23"];
@$acceso_24=$_POST["acceso_24"];
@$acceso_25=$_POST["acceso_25"];
@$acceso_26=$_POST["acceso_26"];
@$acceso_27=$_POST["acceso_27"];
@$acceso_28=$_POST["acceso_28"];
@$acceso_29=$_POST["acceso_29"];
@$acceso_30=$_POST["acceso_30"];
@$acceso_31=$_POST["acceso_31"];
@$acceso_32=$_POST["acceso_32"];
@$acceso_33=$_POST["acceso_33"];
@$acceso_34=$_POST["acceso_34"];
@$acceso_35=$_POST["acceso_35"];
@$acceso_36=$_POST["acceso_36"];
@$acceso_37=$_POST["acceso_37"];
@$acceso_38=$_POST["acceso_38"];
@$acceso_39=$_POST["acceso_39"];
@$acceso_40=$_POST["acceso_40"];
@$acceso_41=$_POST["acceso_41"];
@$acceso_42=$_POST["acceso_42"];
@$acceso_43=$_POST["acceso_43"];
@$acceso_44=$_POST["acceso_44"];
@$acceso_45=$_POST["acceso_45"];
@$acceso_46=$_POST["acceso_46"];
@$acceso_47=$_POST["acceso_47"];
@$acceso_48=$_POST["acceso_48"];
@$acceso_49=$_POST["acceso_49"];
@$acceso_50=$_POST["acceso_50"];
@$acceso_51=$_POST["acceso_51"];
@$acceso_52=$_POST["acceso_52"];
@$acceso_53=$_POST["acceso_53"];
@$acceso_54=$_POST["acceso_54"];
@$acceso_55=$_POST["acceso_55"];
@$acceso_56=$_POST["acceso_56"];
@$acceso_57=$_POST["acceso_57"];
@$acceso_58=$_POST["acceso_58"];
@$acceso_59=$_POST["acceso_59"];
@$acceso_60=$_POST["acceso_60"];
@$acceso_61=$_POST["acceso_61"];
@$acceso_62=$_POST["acceso_62"];
@$acceso_63=$_POST["acceso_63"];
@$acceso_64=$_POST["acceso_64"];
@$acceso_65=$_POST["acceso_65"];
@$acceso_66=$_POST["acceso_66"];
@$acceso_67=$_POST["acceso_67"];
@$acceso_68=$_POST["acceso_68"];
@$acceso_69=$_POST["acceso_69"];
@$acceso_70=$_POST["acceso_70"];
@$acceso_71=$_POST["acceso_71"];
@$acceso_72=$_POST["acceso_72"];
@$acceso_73=$_POST["acceso_73"];
@$acceso_74=$_POST["acceso_74"];
@$acceso_75=$_POST["acceso_75"];
@$acceso_76=$_POST["acceso_76"];
@$acceso_77=$_POST["acceso_77"];
@$acceso_78=$_POST["acceso_78"];
@$acceso_79=$_POST["acceso_79"];
@$monto_autoriza=$_POST["monto_autoriza"];
@$proveedor=$_POST["proveedor"];
@$num_sistema=$_POST["num_sistema"];
@$super_conta=$_POST["super_conta"];
@$aut=$_POST["aut"];
@$cia=$_POST["cia"];
@$depto=$_POST["depto"];
@$agente=$_POST["agente"];
@$cia_ventas=$_POST["cia_ventas"];
@$dep_acc_0=$_POST["dep_acc_0"];
@$dep_acc_1=$_POST["dep_acc_1"];
@$dep_acc_2=$_POST["dep_acc_2"];
@$dep_acc_3=$_POST["dep_acc_3"];
@$dep_acc_4=$_POST["dep_acc_4"];
@$dep_acc_5=$_POST["dep_acc_5"];
@$dep_acc_6=$_POST["dep_acc_6"];
@$dep_acc_7=$_POST["dep_acc_7"];
@$dep_acc_8=$_POST["dep_acc_8"];
@$dep_acc_9=$_POST["dep_acc_9"];
@$dep_acc_10=$_POST["dep_acc_10"];
@$dep_acc_11=$_POST["dep_acc_11"];
@$dep_acc_12=$_POST["dep_acc_12"];
@$dep_acc_13=$_POST["dep_acc_13"];
@$dep_acc_14=$_POST["dep_acc_14"];
@$dep_acc_15=$_POST["dep_acc_15"];
@$dep_acc_16=$_POST["dep_acc_16"];
@$dep_acc_17=$_POST["dep_acc_17"];
@$dep_acc_18=$_POST["dep_acc_18"];
@$dep_acc_19=$_POST["dep_acc_19"];
@$accion=$_POST["accion"];

$tcausrFacade = new TcausrFacade();
$tcausrDto = new TcausrDTO();

$tcausrDto->setnumero_empleado($numero_empleado);
$tcausrDto->setNombre($nombre);
$tcausrDto->setNom_cto($nom_cto);
$tcausrDto->setPwd($pwd);
$tcausrDto->setCve_sql($cve_sql);
$tcausrDto->setPwd_sql($pwd_sql);
$tcausrDto->setNombre_lar($nombre_lar);
$tcausrDto->setPuesto($puesto);
$tcausrDto->setPerfil($perfil);
$tcausrDto->setF_ult_acc($f_ult_acc);
$tcausrDto->setH_ult_acc($h_ult_acc);
$tcausrDto->setF_alt($f_alt);
$tcausrDto->setH_alt($h_alt);
$tcausrDto->setU_alt($u_alt);
$tcausrDto->setF_mod($f_mod);
$tcausrDto->setH_mod($h_mod);
$tcausrDto->setU_mod($u_mod);
$tcausrDto->setAcceso_0($acceso_0);
$tcausrDto->setAcceso_1($acceso_1);
$tcausrDto->setAcceso_2($acceso_2);
$tcausrDto->setAcceso_3($acceso_3);
$tcausrDto->setAcceso_4($acceso_4);
$tcausrDto->setAcceso_5($acceso_5);
$tcausrDto->setAcceso_6($acceso_6);
$tcausrDto->setAcceso_7($acceso_7);
$tcausrDto->setAcceso_8($acceso_8);
$tcausrDto->setAcceso_9($acceso_9);
$tcausrDto->setAcceso_10($acceso_10);
$tcausrDto->setAcceso_11($acceso_11);
$tcausrDto->setAcceso_12($acceso_12);
$tcausrDto->setAcceso_13($acceso_13);
$tcausrDto->setAcceso_14($acceso_14);
$tcausrDto->setAcceso_15($acceso_15);
$tcausrDto->setAcceso_16($acceso_16);
$tcausrDto->setAcceso_17($acceso_17);
$tcausrDto->setAcceso_18($acceso_18);
$tcausrDto->setAcceso_19($acceso_19);
$tcausrDto->setAcceso_20($acceso_20);
$tcausrDto->setAcceso_21($acceso_21);
$tcausrDto->setAcceso_22($acceso_22);
$tcausrDto->setAcceso_23($acceso_23);
$tcausrDto->setAcceso_24($acceso_24);
$tcausrDto->setAcceso_25($acceso_25);
$tcausrDto->setAcceso_26($acceso_26);
$tcausrDto->setAcceso_27($acceso_27);
$tcausrDto->setAcceso_28($acceso_28);
$tcausrDto->setAcceso_29($acceso_29);
$tcausrDto->setAcceso_30($acceso_30);
$tcausrDto->setAcceso_31($acceso_31);
$tcausrDto->setAcceso_32($acceso_32);
$tcausrDto->setAcceso_33($acceso_33);
$tcausrDto->setAcceso_34($acceso_34);
$tcausrDto->setAcceso_35($acceso_35);
$tcausrDto->setAcceso_36($acceso_36);
$tcausrDto->setAcceso_37($acceso_37);
$tcausrDto->setAcceso_38($acceso_38);
$tcausrDto->setAcceso_39($acceso_39);
$tcausrDto->setAcceso_40($acceso_40);
$tcausrDto->setAcceso_41($acceso_41);
$tcausrDto->setAcceso_42($acceso_42);
$tcausrDto->setAcceso_43($acceso_43);
$tcausrDto->setAcceso_44($acceso_44);
$tcausrDto->setAcceso_45($acceso_45);
$tcausrDto->setAcceso_46($acceso_46);
$tcausrDto->setAcceso_47($acceso_47);
$tcausrDto->setAcceso_48($acceso_48);
$tcausrDto->setAcceso_49($acceso_49);
$tcausrDto->setAcceso_50($acceso_50);
$tcausrDto->setAcceso_51($acceso_51);
$tcausrDto->setAcceso_52($acceso_52);
$tcausrDto->setAcceso_53($acceso_53);
$tcausrDto->setAcceso_54($acceso_54);
$tcausrDto->setAcceso_55($acceso_55);
$tcausrDto->setAcceso_56($acceso_56);
$tcausrDto->setAcceso_57($acceso_57);
$tcausrDto->setAcceso_58($acceso_58);
$tcausrDto->setAcceso_59($acceso_59);
$tcausrDto->setAcceso_60($acceso_60);
$tcausrDto->setAcceso_61($acceso_61);
$tcausrDto->setAcceso_62($acceso_62);
$tcausrDto->setAcceso_63($acceso_63);
$tcausrDto->setAcceso_64($acceso_64);
$tcausrDto->setAcceso_65($acceso_65);
$tcausrDto->setAcceso_66($acceso_66);
$tcausrDto->setAcceso_67($acceso_67);
$tcausrDto->setAcceso_68($acceso_68);
$tcausrDto->setAcceso_69($acceso_69);
$tcausrDto->setAcceso_70($acceso_70);
$tcausrDto->setAcceso_71($acceso_71);
$tcausrDto->setAcceso_72($acceso_72);
$tcausrDto->setAcceso_73($acceso_73);
$tcausrDto->setAcceso_74($acceso_74);
$tcausrDto->setAcceso_75($acceso_75);
$tcausrDto->setAcceso_76($acceso_76);
$tcausrDto->setAcceso_77($acceso_77);
$tcausrDto->setAcceso_78($acceso_78);
$tcausrDto->setAcceso_79($acceso_79);
$tcausrDto->setMonto_autoriza($monto_autoriza);
$tcausrDto->setProveedor($proveedor);
$tcausrDto->setNum_sistema($num_sistema);
$tcausrDto->setSuper_conta($super_conta);
$tcausrDto->setAut($aut);
$tcausrDto->setCia($cia);
$tcausrDto->setDepto($depto);
$tcausrDto->setAgente($agente);
$tcausrDto->setCia_ventas($cia_ventas);
$tcausrDto->setDep_acc_0($dep_acc_0);
$tcausrDto->setDep_acc_1($dep_acc_1);
$tcausrDto->setDep_acc_2($dep_acc_2);
$tcausrDto->setDep_acc_3($dep_acc_3);
$tcausrDto->setDep_acc_4($dep_acc_4);
$tcausrDto->setDep_acc_5($dep_acc_5);
$tcausrDto->setDep_acc_6($dep_acc_6);
$tcausrDto->setDep_acc_7($dep_acc_7);
$tcausrDto->setDep_acc_8($dep_acc_8);
$tcausrDto->setDep_acc_9($dep_acc_9);
$tcausrDto->setDep_acc_10($dep_acc_10);
$tcausrDto->setDep_acc_11($dep_acc_11);
$tcausrDto->setDep_acc_12($dep_acc_12);
$tcausrDto->setDep_acc_13($dep_acc_13);
$tcausrDto->setDep_acc_14($dep_acc_14);
$tcausrDto->setDep_acc_15($dep_acc_15);
$tcausrDto->setDep_acc_16($dep_acc_16);
$tcausrDto->setDep_acc_17($dep_acc_17);
$tcausrDto->setDep_acc_18($dep_acc_18);
$tcausrDto->setDep_acc_19($dep_acc_19);

if( ($accion=="guardar") && ($cveTipoAbogado=="") ){
$tcausrDto=$tcausrFacade->insertTcausr($tcausrDto);
echo $tcausrDto;
} else if(($accion=="guardar") && ($cveTipoAbogado!="")){
$tcausrDto=$tcausrFacade->updateTcausr($tcausrDto);
echo $tcausrDto;
} else if($accion=="consultar"){
$tcausrDto=$tcausrFacade->selectTcausr($tcausrDto);
echo $tcausrDto;
} else if( ($accion=="baja") && ($cveTipoAbogado!="") ){
$tcausrDto=$tcausrFacade->deleteTcausr($tcausrDto);
echo $tcausrDto;
} else if( ($accion=="seleccionar") && ($cveTipoAbogado!="") ){
$tcausrDto=$tcausrFacade->selectTcausr($tcausrDto);
echo $tcausrDto;
}


?>