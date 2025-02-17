<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/tcausr/TcausrDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/tcausr/TcausrDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class TcausrController {
private $proveedor;
public function __construct() {
}
public function validarTcausr($TcausrDto){
$TcausrDto->setnombre(strtoupper(str_ireplace("'","",trim($TcausrDto->getnombre()))));
$TcausrDto->setnom_cto(strtoupper(str_ireplace("'","",trim($TcausrDto->getnom_cto()))));
$TcausrDto->setpwd(strtoupper(str_ireplace("'","",trim($TcausrDto->getpwd()))));
$TcausrDto->setcve_sql(strtoupper(str_ireplace("'","",trim($TcausrDto->getcve_sql()))));
$TcausrDto->setpwd_sql(strtoupper(str_ireplace("'","",trim($TcausrDto->getpwd_sql()))));
$TcausrDto->setnombre_lar(strtoupper(str_ireplace("'","",trim($TcausrDto->getnombre_lar()))));
$TcausrDto->setpuesto(strtoupper(str_ireplace("'","",trim($TcausrDto->getpuesto()))));
$TcausrDto->setperfil(strtoupper(str_ireplace("'","",trim($TcausrDto->getperfil()))));
$TcausrDto->setf_ult_acc(strtoupper(str_ireplace("'","",trim($TcausrDto->getf_ult_acc()))));
$TcausrDto->seth_ult_acc(strtoupper(str_ireplace("'","",trim($TcausrDto->geth_ult_acc()))));
$TcausrDto->setf_alt(strtoupper(str_ireplace("'","",trim($TcausrDto->getf_alt()))));
$TcausrDto->seth_alt(strtoupper(str_ireplace("'","",trim($TcausrDto->geth_alt()))));
$TcausrDto->setu_alt(strtoupper(str_ireplace("'","",trim($TcausrDto->getu_alt()))));
$TcausrDto->setf_mod(strtoupper(str_ireplace("'","",trim($TcausrDto->getf_mod()))));
$TcausrDto->seth_mod(strtoupper(str_ireplace("'","",trim($TcausrDto->geth_mod()))));
$TcausrDto->setu_mod(strtoupper(str_ireplace("'","",trim($TcausrDto->getu_mod()))));
$TcausrDto->setacceso_0(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_0()))));
$TcausrDto->setacceso_1(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_1()))));
$TcausrDto->setacceso_2(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_2()))));
$TcausrDto->setacceso_3(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_3()))));
$TcausrDto->setacceso_4(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_4()))));
$TcausrDto->setacceso_5(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_5()))));
$TcausrDto->setacceso_6(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_6()))));
$TcausrDto->setacceso_7(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_7()))));
$TcausrDto->setacceso_8(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_8()))));
$TcausrDto->setacceso_9(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_9()))));
$TcausrDto->setacceso_10(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_10()))));
$TcausrDto->setacceso_11(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_11()))));
$TcausrDto->setacceso_12(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_12()))));
$TcausrDto->setacceso_13(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_13()))));
$TcausrDto->setacceso_14(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_14()))));
$TcausrDto->setacceso_15(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_15()))));
$TcausrDto->setacceso_16(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_16()))));
$TcausrDto->setacceso_17(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_17()))));
$TcausrDto->setacceso_18(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_18()))));
$TcausrDto->setacceso_19(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_19()))));
$TcausrDto->setacceso_20(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_20()))));
$TcausrDto->setacceso_21(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_21()))));
$TcausrDto->setacceso_22(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_22()))));
$TcausrDto->setacceso_23(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_23()))));
$TcausrDto->setacceso_24(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_24()))));
$TcausrDto->setacceso_25(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_25()))));
$TcausrDto->setacceso_26(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_26()))));
$TcausrDto->setacceso_27(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_27()))));
$TcausrDto->setacceso_28(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_28()))));
$TcausrDto->setacceso_29(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_29()))));
$TcausrDto->setacceso_30(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_30()))));
$TcausrDto->setacceso_31(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_31()))));
$TcausrDto->setacceso_32(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_32()))));
$TcausrDto->setacceso_33(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_33()))));
$TcausrDto->setacceso_34(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_34()))));
$TcausrDto->setacceso_35(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_35()))));
$TcausrDto->setacceso_36(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_36()))));
$TcausrDto->setacceso_37(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_37()))));
$TcausrDto->setacceso_38(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_38()))));
$TcausrDto->setacceso_39(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_39()))));
$TcausrDto->setacceso_40(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_40()))));
$TcausrDto->setacceso_41(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_41()))));
$TcausrDto->setacceso_42(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_42()))));
$TcausrDto->setacceso_43(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_43()))));
$TcausrDto->setacceso_44(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_44()))));
$TcausrDto->setacceso_45(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_45()))));
$TcausrDto->setacceso_46(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_46()))));
$TcausrDto->setacceso_47(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_47()))));
$TcausrDto->setacceso_48(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_48()))));
$TcausrDto->setacceso_49(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_49()))));
$TcausrDto->setacceso_50(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_50()))));
$TcausrDto->setacceso_51(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_51()))));
$TcausrDto->setacceso_52(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_52()))));
$TcausrDto->setacceso_53(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_53()))));
$TcausrDto->setacceso_54(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_54()))));
$TcausrDto->setacceso_55(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_55()))));
$TcausrDto->setacceso_56(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_56()))));
$TcausrDto->setacceso_57(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_57()))));
$TcausrDto->setacceso_58(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_58()))));
$TcausrDto->setacceso_59(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_59()))));
$TcausrDto->setacceso_60(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_60()))));
$TcausrDto->setacceso_61(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_61()))));
$TcausrDto->setacceso_62(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_62()))));
$TcausrDto->setacceso_63(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_63()))));
$TcausrDto->setacceso_64(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_64()))));
$TcausrDto->setacceso_65(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_65()))));
$TcausrDto->setacceso_66(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_66()))));
$TcausrDto->setacceso_67(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_67()))));
$TcausrDto->setacceso_68(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_68()))));
$TcausrDto->setacceso_69(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_69()))));
$TcausrDto->setacceso_70(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_70()))));
$TcausrDto->setacceso_71(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_71()))));
$TcausrDto->setacceso_72(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_72()))));
$TcausrDto->setacceso_73(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_73()))));
$TcausrDto->setacceso_74(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_74()))));
$TcausrDto->setacceso_75(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_75()))));
$TcausrDto->setacceso_76(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_76()))));
$TcausrDto->setacceso_77(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_77()))));
$TcausrDto->setacceso_78(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_78()))));
$TcausrDto->setacceso_79(strtoupper(str_ireplace("'","",trim($TcausrDto->getacceso_79()))));
$TcausrDto->setmonto_autoriza(strtoupper(str_ireplace("'","",trim($TcausrDto->getmonto_autoriza()))));
$TcausrDto->setproveedor(strtoupper(str_ireplace("'","",trim($TcausrDto->getproveedor()))));
$TcausrDto->setnum_sistema(strtoupper(str_ireplace("'","",trim($TcausrDto->getnum_sistema()))));
$TcausrDto->setsuper_conta(strtoupper(str_ireplace("'","",trim($TcausrDto->getsuper_conta()))));
$TcausrDto->setaut(strtoupper(str_ireplace("'","",trim($TcausrDto->getaut()))));
$TcausrDto->setcia(strtoupper(str_ireplace("'","",trim($TcausrDto->getcia()))));
$TcausrDto->setdepto(strtoupper(str_ireplace("'","",trim($TcausrDto->getdepto()))));
$TcausrDto->setagente(strtoupper(str_ireplace("'","",trim($TcausrDto->getagente()))));
$TcausrDto->setcia_ventas(strtoupper(str_ireplace("'","",trim($TcausrDto->getcia_ventas()))));
$TcausrDto->setdep_acc_0(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_0()))));
$TcausrDto->setdep_acc_1(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_1()))));
$TcausrDto->setdep_acc_2(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_2()))));
$TcausrDto->setdep_acc_3(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_3()))));
$TcausrDto->setdep_acc_4(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_4()))));
$TcausrDto->setdep_acc_5(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_5()))));
$TcausrDto->setdep_acc_6(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_6()))));
$TcausrDto->setdep_acc_7(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_7()))));
$TcausrDto->setdep_acc_8(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_8()))));
$TcausrDto->setdep_acc_9(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_9()))));
$TcausrDto->setdep_acc_10(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_10()))));
$TcausrDto->setdep_acc_11(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_11()))));
$TcausrDto->setdep_acc_12(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_12()))));
$TcausrDto->setdep_acc_13(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_13()))));
$TcausrDto->setdep_acc_14(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_14()))));
$TcausrDto->setdep_acc_15(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_15()))));
$TcausrDto->setdep_acc_16(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_16()))));
$TcausrDto->setdep_acc_17(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_17()))));
$TcausrDto->setdep_acc_18(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_18()))));
$TcausrDto->setdep_acc_19(strtoupper(str_ireplace("'","",trim($TcausrDto->getdep_acc_19()))));
return $TcausrDto;
}
public function selectTcausr($TcausrDto,$proveedor=null){
$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrDao = new TcausrDAO();
$TcausrDto = $TcausrDao->selectTcausr($TcausrDto,$proveedor);
return $TcausrDto;
}
public function insertTcausr($TcausrDto,$proveedor=null){
//$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrDao = new TcausrDAO();
$TcausrDto = $TcausrDao->insertTcausr($TcausrDto,$proveedor);
return $TcausrDto;
}
public function updateTcausr($TcausrDto,$proveedor=null){
//$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrDao = new TcausrDAO();
//$tmpDto = new TcausrDTO();
//$tmpDto = $TcausrDao->selectTcausr($TcausrDto,$proveedor);
//if($tmpDto!=""){//$TcausrDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$TcausrDto = $TcausrDao->updateTcausr($TcausrDto,$proveedor);
return $TcausrDto;
//}
//return "";
}
public function deleteTcausr($TcausrDto,$proveedor=null){
//$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrDao = new TcausrDAO();
$TcausrDto = $TcausrDao->deleteTcausr($TcausrDto,$proveedor);
return $TcausrDto;
}
}
?>