<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.8.1
*/function
adminer_errors($bc,$cc){return!!preg_match('~^(Trying to access array offset on value of type null|Undefined array key)~',$cc);}error_reporting(6135);set_error_handler('adminer_errors',E_WARNING);$tc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($tc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Hg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Hg)$$X=$Hg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($u){if(!preg_match('~^[`\'"]~',$u))return$u;$_d=substr($u,-1);return
str_replace($_d.$_d,$_d,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Te,$tc=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($y,$X)=each($Te)){foreach($X
as$sd=>$W){unset($Te[$y][$sd]);if(is_array($W)){$Te[$y][stripslashes($sd)]=$W;$Te[]=&$Te[$y][stripslashes($sd)];}else$Te[$y][stripslashes($sd)]=($tc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Ga=false){static$ug=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Ga?array_flip($ug):$ug));}function
min_version($Tg,$Ld="",$i=null){global$h;if(!$i)$i=$h;$Bf=$i->server_info;if($Ld&&preg_match('~([\d.]+)-MariaDB~',$Bf,$A)){$Bf=$A[1];$Tg=$Ld;}return(version_compare($Bf,$Tg)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($Kf,$tg="\n"){return"<script".nonce().">$Kf</script>$tg";}function
script_src($Mg){return"<script src='".h($Mg)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($B,$Y,$Ua,$wd="",$me="",$Xa="",$xd=""){$H="<input type='checkbox' name='$B' value='".h($Y)."'".($Ua?" checked":"").($xd?" aria-labelledby='$xd'":"").">".($me?script("qsl('input').onclick = function () { $me };",""):"");return($wd!=""||$Xa?"<label".($Xa?" class='$Xa'":"").">$H".h($wd)."</label>":$H);}function
optionlist($C,$wf=null,$Pg=false){$H="";foreach($C
as$sd=>$W){$re=array($sd=>$W);if(is_array($W)){$H.='<optgroup label="'.h($sd).'">';$re=$W;}foreach($re
as$y=>$X)$H.='<option'.($Pg||is_string($y)?' value="'.h($y).'"':'').(($Pg||is_string($y)?(string)$y:$X)===$wf?' selected':'').'>'.h($X);if(is_array($W))$H.='</optgroup>';}return$H;}function
html_select($B,$C,$Y="",$le=true,$xd=""){if($le)return"<select name='".h($B)."'".($xd?" aria-labelledby='$xd'":"").">".optionlist($C,$Y)."</select>".(is_string($le)?script("qsl('select').onchange = function () { $le };",""):"");$H="";foreach($C
as$y=>$X)$H.="<label><input type='radio' name='".h($B)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$H;}function
select_input($Ba,$C,$Y="",$le="",$Ke=""){$cg=($C?"select":"input");return"<$cg$Ba".($C?"><option value=''>$Ke".optionlist($C,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Ke'>").($le?script("qsl('$cg').onchange = $le;",""):"");}function
confirm($Td="",$xf="qsl('input')"){return
script("$xf.onclick = function () { return confirm('".($Td?js_escape($Td):lang(0))."'); };","");}function
print_fieldset($t,$Bd,$Wg=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$Bd</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Wg?"":" class='hidden'").">\n";}function
bold($Na,$Xa=""){return($Na?" class='active $Xa'":($Xa?" class='$Xa'":""));}function
odd($H=' class="odd"'){static$s=0;if(!$H)$s=-1;return($s++%2?$H:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($y,$X=null){static$uc=true;if($uc)echo"{";if($y!=""){echo($uc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$uc=false;}else{echo"\n}\n";$uc=true;}}function
ini_bool($jd){$X=ini_get($jd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$H;if($H===null)$H=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$H;}function
set_password($Sg,$M,$V,$E){$_SESSION["pwds"][$Sg][$M][$V]=($_COOKIE["adminer_key"]&&is_string($E)?array(encrypt_string($E,$_COOKIE["adminer_key"])):$E);}function
get_password(){$H=get_session("pwds");if(is_array($H))$H=($_COOKIE["adminer_key"]?decrypt_string($H[0],$_COOKIE["adminer_key"]):false);return$H;}function
q($P){global$h;return$h->quote($P);}function
get_vals($F,$e=0){global$h;$H=array();$G=$h->query($F);if(is_object($G)){while($I=$G->fetch_row())$H[]=$I[$e];}return$H;}function
get_key_vals($F,$i=null,$Ef=true){global$h;if(!is_object($i))$i=$h;$H=array();$G=$i->query($F);if(is_object($G)){while($I=$G->fetch_row()){if($Ef)$H[$I[0]]=$I[1];else$H[]=$I[0];}}return$H;}function
get_rows($F,$i=null,$n="<p class='error'>"){global$h;$kb=(is_object($i)?$i:$h);$H=array();$G=$kb->query($F);if(is_object($G)){while($I=$G->fetch_assoc())$H[]=$I;}elseif(!$G&&!is_object($i)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$H;}function
unique_array($I,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$H=array();foreach($v["columns"]as$y){if(!isset($I[$y]))continue
2;$H[$y]=$I[$y];}return$H;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$p=array()){global$h,$x;$H=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$H[]=$e.($x=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$H[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$y)$H[]=escape_key($y)." IS NULL";return
implode(" AND ",$H);}function
where_check($X,$p=array()){parse_str($X,$Sa);remove_slashes(array(&$Sa));return
where($Sa,$p);}function
where_link($s,$e,$Y,$oe="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$oe:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$K=array()){$H="";foreach($f
as$y=>$X){if($K&&!in_array(idf_escape($y),$K))continue;$za=convert_field($p[$y]);if($za)$H.=", $za AS ".idf_escape($y);}return$H;}function
cookie($B,$Y,$Ed=2592000){global$aa;return
header("Set-Cookie: $B=".urlencode($Y).($Ed?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ed)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($zc=false){$Og=ini_bool("session.use_cookies");if(!$Og||$zc){session_write_close();if($Og&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Sg,$M,$V,$l=null){global$Mb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Mb))."|username|".($l!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Sg!="server"||$M!=""?urlencode($Sg)."=".urlencode($M)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Gd,$Td=null){if($Td!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Gd!==null?$Gd:$_SERVER["REQUEST_URI"]))][]=$Td;}if($Gd!==null){if($Gd=="")$Gd=".";header("Location: $Gd");exit;}}function
query_redirect($F,$Gd,$Td,$df=true,$gc=true,$mc=false,$jg=""){global$h,$n,$b;if($gc){$Qf=microtime(true);$mc=!$h->query($F);$jg=format_time($Qf);}$Nf="";if($F)$Nf=$b->messageQuery($F,$jg,$mc);if($mc){$n=error().$Nf.script("messagesPrint();");return
false;}if($df)redirect($Gd,$Td.$Nf);return
true;}function
queries($F){global$h;static$Xe=array();static$Qf;if(!$Qf)$Qf=microtime(true);if($F===null)return
array(implode("\n",$Xe),format_time($Qf));$Xe[]=(preg_match('~;$~',$F)?"DELIMITER ;;\n$F;\nDELIMITER ":$F).";";return$h->query($F);}function
apply_queries($F,$S,$dc='table'){foreach($S
as$Q){if(!queries("$F ".$dc($Q)))return
false;}return
true;}function
queries_redirect($Gd,$Td,$df){list($Xe,$jg)=queries(null);return
query_redirect($Xe,$Gd,$Td,$df,false,!$df,$jg);}function
format_time($Qf){return
lang(1,max(0,microtime(true)-$Qf));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($Be=""){return
substr(preg_replace("~(?<=[?&])($Be".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($D,$zb){return" ".($D==$zb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($y,$Cb=false){$rc=$_FILES[$y];if(!$rc)return
null;foreach($rc
as$y=>$X)$rc[$y]=(array)$X;$H='';foreach($rc["error"]as$y=>$n){if($n)return$n;$B=$rc["name"][$y];$qg=$rc["tmp_name"][$y];$qb=file_get_contents($Cb&&preg_match('~\.gz$~',$B)?"compress.zlib://$qg":$qg);if($Cb){$Qf=substr($qb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Qf,$ef))$qb=iconv("utf-16","utf-8",$qb);elseif($Qf=="\xEF\xBB\xBF")$qb=substr($qb,3);$H.=$qb."\n\n";}else$H.=$qb;}return$H;}function
upload_error($n){$Qd=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($Qd?" ".lang(3,$Qd):""):lang(4));}function
repeat_pattern($He,$Cd){return
str_repeat("$He{0,65535}",$Cd/65535)."$He{0,".($Cd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$Cd=80,$Wf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Cd).")($)?)u",$P,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Cd).")($)?)",$P,$A);return
h($A[1]).$Wf.(isset($A[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Te,$ad=array(),$Oe=''){$H=false;foreach($Te
as$y=>$X){if(!in_array($y,$ad)){if(is_array($X))hidden_fields($X,array(),$y);else{$H=true;echo'<input type="hidden" name="'.h($Oe?$Oe."[$y]":$y).'" value="'.h($X).'">';}}}return$H;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$nc=false){$H=table_status($Q,$nc);return($H?$H:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$H=array();foreach($b->foreignKeys($Q)as$Cc){foreach($Cc["source"]as$X)$H[$X][]=$Cc;}return$H;}function
enum_input($T,$Ba,$o,$Y,$Xb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Nd);$H=($Xb!==null?"<label><input type='$T'$Ba value='$Xb'".((is_array($Y)?in_array($Xb,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($Nd[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ua=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$H.=" <label><input type='$T'$Ba value='".($s+1)."'".($Ua?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$H;}function
input($o,$Y,$r){global$U,$b,$x;$B=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$xa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$xa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$xa);$r="json";}$jf=($x=="mssql"&&$o["auto_increment"]);if($jf&&!$_POST["save"])$r=null;$Ic=(isset($_GET["select"])||$jf?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ba=" name='fields[$B]'";if($o["type"]=="enum")echo
h($Ic[""])."<td>".$b->editInput($_GET["edit"],$o,$Ba,$Y);else{$Pc=(in_array($r,$Ic)||isset($Ic[$r]));echo(count($Ic)>1?"<select name='function[$B]'>".optionlist($Ic,$r===null||$Pc?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Ic))).'<td>';$ld=$b->editInput($_GET["edit"],$o,$Ba,$Y);if($ld!="")echo$ld;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ba value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ba value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Nd);foreach($Nd[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ua=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$B][$s]' value='".(1<<$s)."'".($Ua?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$B'>";elseif(($gg=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($gg&&$x!="sqlite")$Ba.=" cols='50' rows='12'";else{$J=min(12,substr_count($Y,"\n")+1);$Ba.=" cols='30' rows='$J'".($J==1?" style='height: 1.2em;'":"");}echo"<textarea$Ba>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ba cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Sd=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$A)?((preg_match("~binary~",$o["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Sd+=7;echo"<input".((!$Pc||$r==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Sd?" data-maxlength='$Sd'":"").(preg_match('~char|binary~',$o["type"])&&$Sd>20?" size='40'":"")."$Ba>";}echo$b->editHint($_GET["edit"],$o,$Y);$uc=0;foreach($Ic
as$y=>$X){if($y===""||!$X)break;$uc++;}if($uc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $uc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$rc=get_file("fields-$u");if(!is_string($rc))return
false;return$m->quoteBinary($rc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$H=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$B=bracket_escape($y,1);$H[$B]=array("field"=>$B,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$m->primary),);}return$H;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$zf="<ul>\n";foreach(table_status('',true)as$Q=>$R){$B=$b->tableName($R);if(isset($R["Engine"])&&$B!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$G=$h->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$G||$G->fetch_row()){$Re="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$B</a>";echo"$zf<li>".($G?$Re:"<p class='error'>$Re: ".error())."\n";$zf="";}}}echo($zf?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($Yc,$Xd=false){global$b;$H=$b->dumpHeaders($Yc,$Xd);$ye=$_POST["output"];if($ye!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Yc).".$H".($ye!="file"&&preg_match('~^[0-9a-z]+$~',$ye)?".$ye":""));session_write_close();ob_flush();flush();return$H;}function
dump_csv($I){foreach($I
as$y=>$X){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$X)||$X==="")$I[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$I)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$H=ini_get("upload_tmp_dir");if(!$H){if(function_exists('sys_get_temp_dir'))$H=sys_get_temp_dir();else{$q=@tempnam("","");if(!$q)return
false;$H=dirname($q);unlink($q);}}return$H;}function
file_open_lock($q){$Gc=@fopen($q,"r+");if(!$Gc){$Gc=@fopen($q,"w");if(!$Gc)return;chmod($q,0660);}flock($Gc,LOCK_EX);return$Gc;}function
file_write_unlock($Gc,$_b){rewind($Gc);fwrite($Gc,$_b);ftruncate($Gc,strlen($_b));flock($Gc,LOCK_UN);fclose($Gc);}function
password_file($ub){$q=get_temp_dir()."/adminer.key";$H=@file_get_contents($q);if($H||!$ub)return$H;$Gc=@fopen($q,"w");if($Gc){chmod($q,0660);$H=rand_string();fwrite($Gc,$H);fclose($Gc);}return$H;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$hg){global$b;if(is_array($X)){$H="";foreach($X
as$sd=>$W)$H.="<tr>".($X!=array_values($X)?"<th>".h($sd):"")."<td>".select_value($W,$_,$o,$hg);return"<table cellspacing='0'>$H</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$H=$b->editVal($X,$o);if($H!==null){if(!is_utf8($H))$H="\0";elseif($hg!=""&&is_shortable($o))$H=shorten_utf8($H,max(0,+$hg));else$H=h($H);}return$b->selectVal($H,$_,$o,$X);}function
is_mail($Ub){$_a='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$He="$_a+(\\.$_a+)*@($Lb?\\.)+$Lb";return
is_string($Ub)&&preg_match("(^$He(,\\s*$He)*\$)i",$Ub);}function
is_url($P){$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Lb?\\.)+$Lb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$pd,$Jc){global$x;$F=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($pd&&($x=="sql"||count($Jc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Jc).")$F":"SELECT COUNT(*)".($pd?" FROM (SELECT 1$F GROUP BY ".implode(", ",$Jc).") x":$F));}function
slow_query($F){global$b,$sg,$m;$l=$b->database();$kg=$b->queryTimeout();$Hf=$m->slowQuery($F,$kg);if(!$Hf&&support("kill")&&is_object($i=connect())&&($l==""||$i->select_db($l))){$vd=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$vd,'&token=',$sg,'\');
}, ',1000*$kg,');
</script>
';}else$i=null;ob_flush();flush();$H=@get_key_vals(($Hf?$Hf:$F),$i,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$H;}function
get_token(){$af=rand(1,1e6);return($af^$_SESSION["token"]).":$af";}function
verify_token(){list($sg,$af)=explode(":",$_POST["token"]);return($af^$_SESSION["token"])==$sg;}function
lzw_decompress($La){$Jb=256;$Ma=8;$Za=array();$lf=0;$mf=0;for($s=0;$s<strlen($La);$s++){$lf=($lf<<8)+ord($La[$s]);$mf+=8;if($mf>=$Ma){$mf-=$Ma;$Za[]=$lf>>$mf;$lf&=(1<<$mf)-1;$Jb++;if($Jb>>$Ma)$Ma++;}}$Ib=range("\0","\xFF");$H="";foreach($Za
as$s=>$Ya){$Tb=$Ib[$Ya];if(!isset($Tb))$Tb=$fh.$fh[0];$H.=$Tb;if($s)$Ib[]=$fh.$Tb[0];$fh=$Tb;}return$H;}function
on_help($fb,$Ff=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $fb, $Ff) }, onmouseout: helpMouseout});","");}function
edit_form($Q,$p,$I,$Kg){global$b,$x,$sg,$n;$ag=$b->tableName(table_status1($Q,true));page_header(($Kg?lang(10):lang(11)),$n,array("select"=>array($Q,$ag)),$ag);$b->editRowPrint($Q,$p,$I,$Kg);if($I===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$B=>$o){echo"<tr><th>".$b->fieldName($o);$Db=$_GET["set"][bracket_escape($B)];if($Db===null){$Db=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Db,$ef))$Db=$ef[1];}$Y=($I!==null?($I[$B]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($I[$B])?array_sum($I[$B]):+$I[$B]):(is_bool($I[$B])?+$I[$B]:$I[$B])):(!$Kg&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Db)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$B]:($Kg&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(!$_POST&&!$Kg&&$Y==$o["default"]&&preg_match('~^[\w.]+\(~',$Y))$r="SQL";if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Kg?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Kg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."…', this); };"):"");}}echo($Kg?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$sg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0\0\n @\0´C蔜"\0`E㑸?ÀtvM'JdÁd\\b0\0Ĝ"Àfӈ¤ϧсXPaJ0¥8#RT©z`#.©ǣ혃þȀ?À-\0¡Im? .«M¶\0ȯ(̉ýÀ/(%\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇ٌެ7B14vb0ͦs¼ꮲB̑±٘ޮ:#(¼b.\rDc)Ȉa7E¤¬¦ñ話̎s´筴fӉȎi7³¹¤ȴ4¦ӹ蚦4°iAT«VV馺Ϧ,:1¦Qݼ񢲙`ǣþ>:7Gјҳ°LXD*bv<܌#£e@ֺ4秡fo·ƴ:<¥ܥ¾o✎\niÅ𧬩»a_¤:¹iÁBvø|Nû4.5Nfi¢vpШ¸°l¨ꡖ܏¦£OFQЄk\$¥өõÀ¤2T㡰ʶþ¡-ؚ ޶½£𐎨:¬a̬£됮2#8А±#6n⮑񊞈¢h«t±䴆O42��ޒ¾*r ©@p@!Ĝ¾σ��6Àr[ퟱ�Áퟯ�Bj§!Hb󃐤=!1V\"²0¿\nSƙƏD7ìDڛÏC!!ইʌ§ ȫ=tC橮C¤À:+Ȋ=ªªº²¡±奟ªc�R/EȒ4© 2°䱠㠂8(ᓹ[W䑜=ySb°=ܹ֭BS+ɯȜý¥ø@pL4Yd㗄qø㦰ꢶ£3Ĭ¯¸Ac܌莨k[&>ö¨ZÁpkm]u-c:ؕ¸Nt摎´pҝ8轿#ᛏ.𜞯~ m˹PPἉ֛ùÀ쇑ª9v[Q\nٲ��+ᔑ2­VÁõz䴍£8÷(	¾Ey*#j¬2]­Rҁ¥)À[N­R\$<>:󭾜$;> ̜r»Έ̓TȜnw¡N 巘£¦켯ˇwබ¹\\Y󟠒t^>\r}ٓ\rz鴽µ\nL%J㓋\",Z 8¸i÷0u©?¨ûѴ¡s3#¨ى :󦻍㽖ȞE]xݒs^8£K^ɷ*0ўwޔȞ~㶺푩ؾv2w½ÿ±û^7㈲7£cݑu+U%{Pܪ4̼錘./!¼1Cşqx!H¹ㆤù­L¨¤¨ĠϠ6댨5®f¸Ć¨=Høl V1\0a2׻Զ඾_هĞ\0&�� d)KE'nµ[X©³\0ZɊԆ[Pޘ@ߡ񙂬`ɕ\"ڷ°Ee9yF>˔9bº憵:ü\0}Ĵ(\$ӈ뀳7Hö£蠌M¾A°²6Rú{MqݷG ڙCCꭲ¢(Ct>[쭴À/&C]ꥴG􌬜4@r>ǂ弚Sq/应Q덨mÀІ��LÀܣ贋˼®6fKPݜr%tԈӖ=\" SH\$} ¸)w¡,W\0F³ªu@آ¦9\rr°2ã¬DX³ڹOIù>»nǢ%㹐'ݟÁt\rτzĜ\1hl¼]Q5Mp6kЄqhÜ$£H~͂|Ҕݡ*4񜐲۠S뽲S t퐐\\g±跇\n-:袪p´lB¦Өc(wO0\\:зÁp4򻔚újO¤6HÊ¶rՒ¥q\n¦ɥ%¶y']\$aZӮfcձ*-ꆗºúkz°µj°lgጺ\$\"ގ¼\r#ɤ⃂¿гcᬌ \"jª\rÀ¶¦Ւ¼Ph1/DA) ²ݛÀknÁp76ÁY´R{ፅ¤Pû°򀜮-¸a·6þߛ»zJH,dl B£ho³쟂򝬫#Dr^µ^µ٥¼E½½ ĜaP��£z౴񠲇Xٖ¢´Á¿V¶ןޙȳт_%K=E©¸b弾߂§kU(.!ܮ8¸üɌI.@K͸nþ¬ü:Ð󎳇2«m툉	C*캶┅\nR¹µ0u­朮ҧ]Λ¯P/µJQd¥{L޳:YÁ2b¼T 񝊳Ӵ䣪¥V=¿L4ΐrġ߂𙳶͙­MeLªܝ眶ùiÀoй< G¤ƕЙMhm^¯UێÀ·򔲋5HiM/¬n흳T [-<__Xr(<¯®ɴ̌uҖGNX20圲\$^:'9趏턻׫¼µf N'a¶ǎ­bŬ˖¤􅫱µ!%6@úϜ$҅Gڜ¬1(mUª兲ս堡ЩN+Ü񩚜䰬ؒf0Æ½[U⸖ʨ-:I^ \$س«b\reugɨª~9۟bµ􂈦䫰¬ԠhXrݬ©!\$e,±w+÷댳̟⁅kù\nkòõʛcuWdYÿ\\׽{.󄍘¢g»p8t\rRZ¿vJ:²>þ£Y|+ŀÀۃCt\rjt½6²𞋥¿ഇ񒞾ù/¥͇ퟻ�`ו䲶~K¤ᶑRЗ𺑌ꬭªwLǹY*q¬xĺ񨓥®ݛ³跣~D͡÷x¾뉟i72ĸяݻû_{񺵳⺴_õzԳùd)C¯$?KӪP%ϏT&þ&\0P׎A^­~¢ pƅ öϜԵ\r\$ޯЖ좪+D6궦ψޭJ\$(ȯlލh&싂S>¸ö;z¶¦xůz>휚oĚ𜮊[϶õ˂Ȝµ°2õOxِVø0fûú¯޲BlɢkжZkµhXcd갪T⯈=­πp0lV鵋袜r¼¥nm¦難 ú");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:gCI¼ܜn8Ň3)°˃781Њx:\nOg#)Ъr7\n\"贠ø|2̧SiH)N¦S䧜r\"0¹Ā䩝`(\$s6O!ӨV/=' T4潄iS6IO G#ҁX·VCƳ¡ Z1.Шp8,³[¦H䵋~Cz§ɥ2¹l¾c3ͩs£ىbⴜn醸TƚIݚ©U*fz¹䲰EƓÀع¸񦎙.:攃Iʨأ·ᅎ!_lힷ^(¶N{S)r˱ÁYl٦33ڜn+G¥Ӫyº톋i¶®xV3w³uh㞲؀º´a۔ú¹cب\r¨먮ºChҼ\r)董¡`淣�3'm5£ȕ\nPܺ2£P»ªq 򿅃}īúʁ곸BذhRȲ(0¥¡b\\0Hr44ÁB!¡pǜ$rZZ˲܉.Ƀ(\\5Ë|\nC(Μ"P𸮋Ў̒TʕΓÀ澄HN8HP᜜¬7Jp~ܻ2%¡ЏC¨1㮃§C8·HȲ*j°᜷S(¹/¡쬶KUʞ¡<2pOI��ԤⳈdOH ޵-üƴ㰘25-Ң򛈰z7£¸\"(°P \\32:]Uڗ譢߅!]¸<·AۆۤПiڰl\rԜ0v²ΣJ8«Ϸm펉¤¨<ɠ漥m;p#㠘Dø÷iZøN0ȹø¨占Á蠓wJD¿¾2ҹt¢*øι싎iIh\\9ƕ萺杅ḯ­µyl*ȈΗ晠ܗø긒W³⿵ޛ3ٰʡ\"6囮[¬ʗ\r­*\$¶Ƨ¾nzxƹ\r켪3ףpޓﻶ:(p\\;ԋmz¢ü§9󜐑ü8NÁj2½«ΜrɈH&²(úÁ7i۫£ ¤c¤e򞽧t̌2:SH󈠃/)xހ饴ri9¥½õ뜸π˯yҷ½°Vī^Wڦ­¬kZ晗l·ʣ4ֈƋª¶À¬𜜅Ȼ0¹pDi-T澚û0l°%=Á Ж˃9(5𜮙\nn,4\0菡}܃.°öRs\02B\\ۢ1S±\0003,ԘPHJsp夓K CA!°2*WԱڲ\$䫙¦^\n1´򺅃 Iv¤\\䜲ɛ .*A°E(d±ᰃb꜂܄ƹ Dh&­ª?ĝH°sQ2x~nÁJT2ù&㠥R½GґTwꝑ»õP⣜\ )6¦��򳅨\\3¨\0R	À'\r+*;Rퟢ�!ћͧ~­%t< 簜K#桚񬟌ퟰ�³٬Ā®&ᜤ	Á½`CXӆ0֭弻³ĺM騉皜G䑡&3 D<!萲3ÿh¤J©e ڰhᑜr¡mퟹ�¸£´ʎ؈l7¡®vꗉ宋´Á-ӵ֧ey\rEJ\ni*¼\$@ڒU0,\$U¿E¦Ԕªu)@(tΙSJkᰡ~­ए`̾¯\nû#\rp9jɹܝ&Nc(rTQUª½S·ځ\08n`«yb¤ŖL܏5򞑾x⁢±f䴒☚+\"щ{kMț\r%ƌ[	¤e􎡔1! 迭³Ԯ©F@«b)R£72\nW¨±L²ܜҮtdի휜0wglø0n@򪉢թ퍫\nA§M5n윤E³ױNۡl©ݒז쥪1 Aܻºú÷ݫ񲮩FB÷Ϲol,muNx-͟ ֤C( f遬\r1p[9x(i´BҖ²ۺQlüº8Cԉ´©XU Tb£݉ݠp+V\0;Cb΀X񫏒s＝H÷қ᫋x¬G*􆏝·awnú!Ŷ򢛐mS�IލK˾/ӥ7޹eeNɲªS«/;d偆>}l~Ϫ ¨%^´f瘢pڜDE·t\nx=ëЎ*dºꄰTºüûj2ɪ\n ɠ,e=M84��aj@sԤnf©ݜn\rd¼0ޭ��%ԓ혞~	Ҩ<֐ˋAH¿G8񙿝΃\$z«𻶻²u2*ࡏÀ>»(wK.bP{oý´«zµ#낲ö8=ɋ8>ª¤³A,°e°À+샨§xõ*áҭb=m,aìzkWõ,mJi抧᷁+轰°[¯ÿ.RʳKùǛ䘧ݚZL˧2`̜(vZ¡ܝÀ¶蜤׹,儿H±֖NxX��¨\$󬍍*\nѣ\$<qÿşh!¿¹S⃀xsA!:´K¥Á}Á²ù¬£RþA2k·Xp\n<÷þ¦ý묬§ٳ¯ø¦țVV¬}£g&Yݍ!+󻼸YǳYE3r³َ񆛃�¦Ź¢ճϫkþø°֛£«ϗt÷Uø­)û[ý߁ص´«l確Dø+Ϗ _o㌤h140֡ʰø¯b䋘㬒 öþ鄻lGª#ª©ꎅ¦©켕d涉K«ꂷެค@º®O\0HŚퟢ�6\rۂ©ܜ\cg\0ö㫲BĪeМn	zr!nWz& {H𧜤X  w@Ҹ뎄Gr*넝H姰#Į¦Ԝndü÷,􏥗,ü;g~¯\0У̅²E\r։`𒥅Ү ]`ʌЛ%&Юm°ý\r➅%4Sv𣜮 fH\$%됌-£­ƑqB⭦ À-􎣲§&Àّ̝ 腱h\r񬝠®s ЇѨ䋷±n#±ڭઅ¯Fr礬&dÀؙ庬F6¸Á\" |¿§¢s@ߚ±®庌)0rpڏ\0X\0¤٨|DL<!°��D¶{.B<Eª0nB(|\r\n잩͠h³!֪r\$§(^ª~螂/pq²̂¨ŏ𺬜\µ¨#RRΎ%뤍dЈjċ` 􋮌­ V哅 bSd§iEøﯨ´r<i/k\$-\$o¼+ƅκlҞO³&evƒ¼iҪMPA'u'Ό( M(h/+«򗄾So·.n·.𮔸쪨(\"­À§hö&p¨/˯1D̊窥¨¸E螦⦀,'l\$/.,Ĥ¨WbbO3󂳳H :J`!.ªÀû¥ ,FÀѷ(Ȕ¿³û1l峠֒²Ţq¢X\rÀ®~R鰱`®Ҟ󮙪互¨ùrJ´·%Lϫn¸\"ø\r¦΍H!qb¾2〈±%ӞΓ¨Wj#9ӔObE.I:6Á7\0˶+¤%°.Ȓޅ³a7E8VS忇(DG¨ӳB륻򬹔/<´ú¥À\r 쇴>ûMÀ°@¶¾H DsЋ°Z[tH£Enx(ퟲ� x񏻀¯þGkjW>̂ڣT/8®c8鑰˨_ԉIGII!¥ퟨ�Ed˅´^td鴨 DV!C渎¥\r­´b3©!3↎@ٳ3N}⚂󳐉ϳ俳0ڜM(꾂ʽ䜜Ѵꂦ fˢI\r®󳳷 XԜ"tdά\nbtNO`P⻔­ܕҭÀԎ¯\$\nߤZѭ5U5WUµ^hoýঈtِM/5K4Ej³KQ&53GXXx)Ҽ5D\rûV��r¢5b܀\\J\">§豓\r[-¦ʄuÀ\rҢ§é00󙵈ˢ·k{\nµģµޜr³^·|赜»U埮ɕ~YtӜrIÀ䏳R 󎳺ҵePMS谔µwW¯XȲ򄨲¤KOUܠ;Uõ\n OY降Q,M[\0÷_ªD͈W ¾J*윲g(]ਜr\"ZC©6uꏫµY󎈓Y6ô0ªqõ(ٳ8}󕳁X3T h9j¶jইõMt吊bqMP5>ퟣ�©Yk%&\\1d¢؅4À µYnʌ휤<¥U]Ӊ1mbֶ^ҵ ꒅ\"NV韰¶밵±eMڞכW霢䩑\n ˜nf7\nׅ2´õr8=Ek7tVµ7P¦¶Lɭa6򕔲v@'6i௪&>±☻­㠒ÿa	\0pڨ(µJѫ)«\\¿ªnû򄬒m\0¼¨2��qJö­P��±fjü"[\0¨·¢X,<\\⌷淫md徇⌠ѳ%o°´mnש,ׄ攇²\r4¶¸\r±Ό¸׭EH]¦üֈW­M0D徏ˁKø¸´༦؞ܗ\r>ԭz]2sxDd[stS¢¶\0Qf-K`­¢t؎wT¯9暀ɸ\nB£9 Nb㼚BþI5oׯJ񰀏JNd勜rhލÖ2\"ฦHCݍ:øý9Yn16ƴzr+z±ùþ\\÷��±T ö򠷀Y2lQ<2O+¥%ͮӃhù0Aޱ¸Ú2R¦À1£/¯hH\r¨XȡNB&§ č@֛xʮ¥ꖢ8&Lږ͜vై*j¤ۚGH刜\ٮ	²¶&sۓ\0Q \\\"袠°	ĜrBsɷ	١BN`7§Co(كਜnè¨19̪E 񓅓U0Uº t'|m°޿h[¢\$.#ɵ	 剰โ��ꄀ|§{Àʐ\0x��w¢%¤EsBd¿§CU~O׷Ѕ❄ԃ¨Z3¨¥1¦¥{©eLY¡ڐ¢\\(*R` 	জnΈº̑CFȪ¹¹ੜ¬ڰX|`N¨¾\$[@͕¢అ¦¶ڥ`Zd\"\\\"¢£)«I:贚쯄拜0[²¨ű-© g�®*`hu%£,¬㉵7ī²H󵂭¤6޽®ºN֍³\$»MµUYf&1ùÀe]pz¥§ډ¤ŭ¶G/£ ºw ܡ\\#5¥4I¥d¹E¨q妄÷Ѭk縼ګ¥qDbz?§º>ú¾:[茒ƬZ°X®:¹·ښǪ߷5	¶Y¾0 ©­¯\$\0C¢dSg¸됂 {@\n`	ÀüC ¢·»Mºµ⌻²# t}xΎ÷º{º۰)껃ʆKZޏj0PFYB䰆k0<ھʄ<JEg\rõ.2ü8镀*εfkª̙JD숉4TDU76ɯ´诀·K+×öJ®ºÂ퀓=ܗIOD³85MNº\$R􏜰ø5¨\r๟𪏜셜񏉫ϳN笣ҥy\\��qUБû ª\n@¨ۺð¬¨P۱«7ԽN\rýR{*qmݜ$\0RהťqЌÈ+U@ނ¤煏f*CˬºMC䠟 腼򽋵Nꦔⵙ¦C׻© ¸ܜWÅe&_X_؍h嗂Ƃ3ÀۥܟFW£û|Gޛ'ś¯łÀ°ٕV У^\r猦GR¾P±݆g¢ûYi û¥Ǻ\n⨞+ߞ/¨¼¥½\\6蟢¼dmhע@q폍Ձh֩,J­חǣm÷em]ӏeϫZb0ߥþY񝹭臦؞e¹B;¹ӪOɀwapDWûɜӻ\0À-2/bN¬sֽ޾RaϮh&qt\n\"՚iöRmühzϥø܆S7µНPP򤖤✺B§╳m¶­Y dü޲7}3?*tú򩏬Tڽ~佣ý¬֞ǉڳ;T²L޵*	񾣵A¾sx-7÷f5`أ\"NӢ÷¯Gõ@ܥü[︁¤̳¸-§M6§£qq he5\0ҢÀ±ú*ࢸISܒɜFή9}ýpӭøý`{ý±ɖkP0T<©Z9䰒<՚\r­;!Ögº\r\nKԋ\n\0Á°*½\nb7(À_¸@,\rÀ]K+\0ɿp C\\Ѣ,0¬^§º©@;X\r𿃜$\rj+ö/´¬Bö搠½ù¨J{\"aͶ䉜¹|壜n\0»ܜ5Љ156ÿ .ݛد\0d萲8Y瓎:!ј²=ºÀX.²uCªö!Sº¸opӂݼ۷¸­ů¡Rh­\\hE=úy:< :u³󲵸0si¦TsBۀ\$ ͒逇u	ȑº¦.􁂔0M\\/ꀤ+ƃ\n¡=Ԍ°dūA¢¸¢)\r@@¨3ٸ.eZa|.ⷝYkУÀ񖧄#¨Y򕀘q=M¡ﴴB AM¤¯dU\"Hw4>¬8¨²Ã¸?e_`ЅX:ā9ø��ФGy6½ÆXr¡l÷1¡½ػB¢Å9Rz©õhB{\0륞íⰩ%D5F\"\"ڜʃúiĠˆٮAf¨ \"tDZ\"_֜$ª!/Dᚆ𕿵´٦¡̀F,25ɪT롗y\0N¼x\r癬¦#ƅq\n͈B2\n웠6·Ĵӗ!/\n󃔙Q¸½*®;)bR¸Z0\0ăDo˞48À´µХ\n㦓%\\úPIk(0Áu/G²Ƙ¹¼\\˽ 4FpGû_÷G?)gȯtº[v֜0°¸?bÀ;ªˠ(یඎNS)\n㸽萫@ꜷjú0,𱃅z­>0Gc𣌅VX􃑱۰ʘ%ÀÁQ+ø鯆FõȩܶоQ-㣝ڇl¡³¤w̺5Gꂀ(hcӗHõǲ?Nbþ@ɟ¨öǸ°3U`rwª©ԒUÔ��ԽÀl#򵏬ÿ䨉8¥E\"O6\n±e£`\\hKfV/зPaYK珌ý 鏠x	Oj󛏲7¥F;´ꁂ»꣭̒¼>愐¦²V\rĖļ©'Jµz«¼#PB䄒Y5\0NC¤^\n~LrRԛ̟Rì񧀥Z\0x^»i<Q㯩ӥ@ʐfB²Hfʞ{%Pܢ\"½ø@ªþ)򒈑DE(iM2S*y򓁜"ⱊe̒1«ט\n4`ʩ>¦Q*¦܁y°n¥T䵔⤔Ѿ%+W²XK£Q¡[ʔଁPYy#D٬D<«FLú³ՀÁ6']Ƌû\rFĠ±!%\n0cдÀ˩%c8WrpG.TDo¾UL2ت鼜$¬:蜲½@汨&ҴH>  %0*Zc(@ܝ󛌑:*¬⨦\"x'JO³1¹º`>7	#ٜ"O4PXü±|B4»鉛ʘ鈙\$n`��Aõ֋AH» \")𔁠©㓚¨ûfɦÁº-\"˗ú+ɖº\0s-[fo٧̈́«𐸋󦸔õ¾=C.õ9³­ΦÁ\07¡?Ó95´֦ZǄ0­­¨หH?R'q>oڈʀaDùG[;G´D¹BBdġq ¥2¤|1¹챙²䀎岷<ܣª§EY½^§ ­Q\\뛘񥔨ž?v 抉Ɍ͑ ̧\0ǩ´®guЧ42jú'󎁔䔂Ͷy,uۄ=pH\\^b䬐q؁ĩtÅ𘅀£FPɁ@Pú¥T¾i2#°gDᮙ񥹙@");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Gc=file_open_lock(get_temp_dir()."/adminer.version");if($Gc)file_write_unlock($Gc,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$m,$Mb,$Rb,$Zb,$n,$Ic,$Mc,$aa,$kd,$x,$ba,$zd,$ke,$Je,$Tf,$Qc,$sg,$wg,$U,$Jg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Ce=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Ce[]=true;call_user_func_array('session_set_cookie_params',$Ce);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$tc);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$zd=array('en'=>'English','ar'=>'العربية','bg'=>'Български','bn'=>'বাংলা','bs'=>'Bosanski','ca'=>'Català','cs'=>'Čeština','da'=>'Dansk','de'=>'Deutsch','el'=>'Ελληνικά','es'=>'Español','et'=>'Eesti','fa'=>'فارسی','fi'=>'Suomi','fr'=>'Français','gl'=>'Galego','he'=>'עברית','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'日本語','ka'=>'ქართული','ko'=>'한국어','lt'=>'Lietuvių','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'Português','pt-br'=>'Português (Brazil)','ro'=>'Limba Română','ru'=>'Русский','sk'=>'Slovenčina','sl'=>'Slovenski','sr'=>'Српски','sv'=>'Svenska','ta'=>'த‌மிழ்','th'=>'ภาษาไทย','tr'=>'Türkçe','uk'=>'Українська','vi'=>'Tiếng Việt','zh'=>'简体中文','zh-tw'=>'繁體中文',);function
get_lang(){global$ba;return$ba;}function
lang($u,$fe=null){if(is_string($u)){$Me=array_search($u,get_translations("en"));if($Me!==false)$u=$Me;}global$ba,$wg;$vg=($wg[$u]?$wg[$u]:$u);if(is_array($vg)){$Me=($fe==1?0:($ba=='cs'||$ba=='sk'?($fe&&$fe<5?1:2):($ba=='fr'?(!$fe?0:1):($ba=='pl'?($fe%10>1&&$fe%10<5&&$fe/10%10!=1?1:2):($ba=='sl'?($fe%100==1?0:($fe%100==2?1:($fe%100==3||$fe%100==4?2:3))):($ba=='lt'?($fe%10==1&&$fe%100!=11?0:($fe%10>1&&$fe/10%10!=1?1:2)):($ba=='bs'||$ba=='ru'||$ba=='sr'||$ba=='uk'?($fe%10==1&&$fe%100!=11?0:($fe%10>1&&$fe%10<5&&$fe/10%10!=1?1:2)):1)))))));$vg=$vg[$Me];}$xa=func_get_args();array_shift($xa);$Ec=str_replace("%d","%s",$vg);if($Ec!=$vg)$xa[0]=format_number($fe);return
vsprintf($Ec,$xa);}function
switch_lang(){global$ba,$zd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$zd,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($zd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($zd[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$ra=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Nd,PREG_SET_ORDER);foreach($Nd
as$A)$ra[$A[1]]=(isset($A[3])?$A[3]:1);arsort($ra);foreach($ra
as$y=>$We){if(isset($zd[$y])){$ba=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($ra[$y])&&isset($zd[$y])){$ba=$y;break;}}}$wg=$_SESSION["translations"];if($_SESSION["translations_version"]!=4240734095){$wg=array();$_SESSION["translations_version"]=4240734095;}function
get_translations($yd){switch($yd){case"en":$g="A9DyԀs:ÀGࡨ¸ff¦㉈ق:ćS°ޡ2\"1¦..L'I´ꭑ#ǳ,KOP#Ì%9¥i4ȯ2ύƳ ˬ9%ÀPÀb2£a¸ಜn2NCȨ޲4ͱC`(:Eb繁ȩ:&㙔幷F󽐔Y\r´\n 8Zԓ=\$A¤`ѽ˜²0ʜnңdF鉌ޮ:Zΰ)­㑦Ոmw۸ݏ¼ꭦpQ˗΂qꡊį±#q®w7SX3 o¢\n>ZMziÄs;ٌ_ł:øõ𣼀贶ú¾\r-z| (j*¨0¦:-h橯̸򸩫r^1/Л¾η,ºZӈKX¹,¢pʺ>#օ㨞6űB��شµ¨Ȳ¶Ltî˂ϜnH¤h\n|Z29CzԷI𚦈\nj=)­è\nC˺³\$͌0ʖZsjԌ±8ƴN`򻀈Pö9Ikl m_<\"􈔜"²ºL̘ڔ£Բт踏q£a	r¡4©Ԉ1OAH<²M	˕\$ɳՖʺإ¸\$	К&B¦c͜<´ږKF©¬ڢ⧭~,겨 J\0Ap܎9À«␦'°h6B;¿0͝·휢üƎR΂¯\" ލJ㰲¯¨Ʊ©#̺¶݅¼Põ[²µ§鈚ٳµ¦\rOآ⸞+¯̡º􀬕ܺ³¬0)`>x(\n[ª׋򡄂ɝ/؋]G㐀\$cB3¡яt㾔\$£º³ἀ¨襔7ᐽº³x!õý¢ݰXഇ؊;<¼y9%	R£\n½ڬñ	¨]­뺾ñ.ϴ�ֿۆ弝P#_¼¨𒱜"õ鿰6øA?㺂̊㚸öʒŁ<p~õ=۲¦×DùZJ0Ѽ(¾09i£h#3;­ez&ʙ¶ÿ²퟈�Ɓ\0ǟK2؃0=mآ˹¿\\繹֟ɨ \n ( ´ÿˠ \0\"Hɦ4D !󾶎i#FD42.eIA©¥¢LܓՐ\$💰滘7~\$𷇆xdq򄜮\0004§·vZ[¯3Ĉ1򨑺9Gd!0¤¡rέRȶI90f¥­Ȓ²ZKͲB§öHIN8d'ŽW5±㭯݆.SH Ŝueù  !ęH¥St�«Ƈ'Ǹʴ«ˌ\n	ጪCÀ悑5aѮSΖ£ف>񽳵rJs}yE܀½JA§d ¥\0gL(#ÁRôXix荙&\0JI&,+ӈqќ\1%VΐʬH⚝SsNH¬Mپ3¯QT&ƫ§3匊r}«Iû8Ѹ +ꂃ`+񔵮s²H⑳Nퟆ̂˂	'ºG=@B F ᱚ⮳IB¨0i~{Nb[\nҵ0F«ɞǦĈzMoú¶\"ùq\\¦ѰÛ5Jٮᠮ太3j]x5ɠAFb?ᴳcÀITI§F«Ào'/Dǎý:¦jt(j7꼼B¢õPN\nyQm6ARմUVWù_YOS򄄰A\r-Zц;HHm0.";break;case"ar":$g="ك¶P²l*\r,&\nف¶털(J.0Se\\¶\rbـ¶0´,\nQ,l)ŀ¦µ°¬A򩪒_1CЍ«e¢S\ng@Og먴XلM둩°0cA¨خ8ǥ*y#au4¡ ´Ir*;rSÁUµdJ	}Α*zªU@¦X;ai1l(n󛕲ýÛӹd޵'c(ܯF±¤إ3Nb¦ 갲NS¡ ӳ:LZúz¶P؜\b漵Į[¶Q`u	!­Jyµ&2¶(gT͔SњMƸ쵧5¸K®K¦¦طᗰʀ(ª7\rm8(乜r㒦\"7N¹´£ ޙ4ø荶ㄓx滁#\"¸¿´¥2ɰW\"J\nBꧨkÀūb¦Di✜@ªꊰ¬깦 ­9ʚV¨?TXW¡¡FÇ{⹳)\"ªW9Ϛ|Á¨eRhU±¬Ҫû1ƁP>¨ꂄ\"o|ٷ£隑LQi\\¬ H\"¨¤ª#¨1꣘ą򃜇Jrª >³J­шsޜ:?P]<­T(\"'?°npSJ©SZªɻ¬\"Ü"T(ü̼¶@SN¨^v8bW±Vµ#ϙ«¢3ҨÄ˚>T&´´ꔵ´L𾱥´ȓµx£强Ƨȍ±@I«²˷º²[IϬ~ȡTقl¨tK=덮¨)uқ¨83¨Q_@	¢ht)`PԵ㨚cT0©¢CӬ𠏨H\"7¥¶pL\n7gM*gژʼ7cp洍úRg:ŠBC趁L󀰎M(޳ãԲё[!*j=A@ºbO!B ޔ\r£ܼ®:cd9èؐ\rxεach9oΰ½A\"׃kԺ·a@攰¸c\rO±5·/ۚ¾­jf*4Pf3gîõɋ\rз1麘Ƀ룰z\r 踎aОþ\\0öûḊ7𖀺iğ{͓Գx)!3갹NƁ«ȚS~^(\$®HWsjt)õUªRfPy»F¥\"\0䮚8p\r-u<+ǹ/-漷¢ޛշ/\\9=¶öC۩m4\"Hm¼6½°躟[<Ԟõtmaء\rf4¡ČݝȮ<ý㮠̩)?j¤Ƌ\\ü	!.¬4P߃Mܗ80ĩCvʚ«  Ro­ýÀ¸7\nᐜ$d7¦Ү°ÜrA\0cش؜Ѫ6G%ø·RJ¾:¸a§񛶶\0jC@pSD4³CEJɆH6ګ¹ښTk\rq°ª露5cfoЪΔ;˸¸¢!³xa͎·眤\r서rÁÁ̀À懑c7Á4C°ҙވ 񰒆0¬!4\$䴙\0FJ+EFꤙmHhÁú_y\r-P¢U2\\ݠi両ÀꜮز~'R\0HņAE(爥(BԡZFjŧ퟼�I#A䏂\0ȚUѧB耷C󼬚豎¦ɋd]¬\"x%7\n#七¦ŧؚ 'ӱ\n<)BDYü/褗º,¤UỢѸ¢BlN\$¨ĺOɲs꺻ȪɍUL D¡h¢ºڛS㐜n (ڋ7!·p¯P<0ŵÁ\0S\n!0ib\rkÈÁP(XZZ䡒rT֛´iSR\$ؘõF~Ȃ´.uH£¬ۭ:³\$±5ƍӭ¨P֭\"؃lY­ª0¸剘Cȶº|Ckhᇩ\rL嬻Á¤37Lµ\r®ɋͷ\"B F ៻ʎz�}��{Žx#ªøÒ5\n[5w¿儀*PnݝalֶD朜#\0Z顐¨򀽝r¶갛\0DuR¢¡D-.aH¨!ɑ\0STX늂f}\r¨% Е£禅¨·@\$rq3T¾ϕ«Ǡl_é¯ͦdÁ]զ!\$Ys۵¾³FÀ«UՑ«I¦͇Q+ߌ· Pd";break;case"bg":$g="А´\rEр4°!Awh Z(&Ծ\nfa̔ЎŠіþD4Еü\"Н4\r;Ae2­a°µ¢.a¨úrpº@ד|.W.X4򥫆Pµ̢؜$ªhR೉܊}@¨Зpِ悢4sE²΢7f&E, өX\nFC1 Ԭ7c򘍅o)_Gג蚎_<Gӭ}͓,k놊qPX}F³+9¤¬7i£Z贚i푡³_a·Z˪¨n^¹ɕS¦ܹ¾ÿ£YVښ¨~³]И\\R󉶱õԽ±j⽉¬l괍v±ø=膳	´\0ù@D|ܚ¤³[ª^]#𳮕3d\0*Øܷ㰀2C޹( º#¹¡\0ȷ£A誸\\z8Fc䗭 Xú4;¦rԧHS¹2˶A>邦6˂ÿ5	Ꜹ®kJ¾®&ꪪ½\"Kºüª°ن߹{.䎭ʞ争*U?+*>SÁ3z>J&SK꟦©ިR»֦³:㖉>I¬JªL㈑,«ʣ¥/µ\r/¸͓YF.°Rc[?ILΘ6M¢)£住Vѵ԰КRfʥrhª񩃐ʍW4²¬&+Œد«\\´A#\"խ(ݔU⭣	ZwøjKᜰ+@Á\"M*EV\nCਤʯbM󲢴Á+ϩºYNJb˂X芖£Ҷ#䲧,}䩤́C2 ¾§薒*ZWE*ª¼ ˲­x§ם깁N}ޒ[4ü纻^a\n�R8th(Ħ΀ P¶®³ۈº´Ŧ虛v½ʚ¾²VõD\"\r#b6F«pAģwć\\g2 ʷcHߌ.(¨¾? PغTFO2򿷊ȗ;;k¼=Áö˓¼ᩒ¥»LöܤpRM¤֨kù⎮´Ávμ¯y±¢?}EУL±¤jޣh÷Jfw£ø\n÷¼ø´73ùT5w:ȯ¡mz~]둞 ö㜻ŉ-v,\\PѫB̠Դr􁞱'3*QЦqՌΈd\r¡¤7\"ܛ À@r¡ Н p`藂𯏁paP䖙Á{蝇G4x\"ѱΏxaδ¿ !¥ù*j𘐱`ݹ^I¢=铸κ_@ªx¸ª̡	䠜$ˎ5<򄜋ayAj̙À]a|1p֛Øwaøw1¢ȏbr΢'Œ܏¢\$Gᬅ´÷QѦU᧕ôOye>GM=un^ֹárd­£B\r⥧%nY=¤ퟬ�8f¨^tNS\\¬Á@ЍCcάv^\0bF¡ÁA 䛃*ˇ\$|Ú9a:Μ0؛ü\$¡¤:A?Q«\01èV¢pa\r̦6­4J²Q)®B#xVꐚ;Jw:\n (&-DS+½?ÀҞd	Y5l騜0 桬ڊӼ7\0܃HveᔳΚ|ӅGa½ЩLօ֥B𦑧 T­ࠝREHቷpКCþaΔkWa>d ӱ>Lü(*\"Hle\"8Hv��M\$OõF&¸eR×uhtݧ¸֔Q¨;QТDR2g4]j%f噜\K-6» )¨/l2K.±°'´㌓׍d|Hׇ4KK±�S¢\\&��¥\$¤&¦¡OK\$x¼ɰNўxϬ^»Mj绷Ϛ^¾p+א҂·4«K͠⌛׮ߚY wÁ۳ʎ¯¨¶·¨ƣ¹_®¢E¤1dùgNJ¥À.鐚.¥I­!!¯\nٖ@L,吵C-Á\0F\nL÷֋ʚRY®єÀ^ݓ±*ŜnÀԯcªy釬ŗ޿ȰJù8²F>LƕŞ6°¶S»bƼÀuڹ򓉣Y\n¥¬،ö]j/yF³\\§12´_˗MӱÁDn6²útɊ⻫\\ℓ¥©zoלnZ;ªݡMӬɖo¦sZN*@AŁɖ¿2rЎ0´]ù1(c(mn櫝ڥ­®֭2b¸.WWڱ艎´÷1¾±TUÿ<饛ڑy.2µv«i¬㲴=؁C§pؔJÁ?y´ȺeҪW Z³[­¥{gW\0֜rø҈R_vÿy2~\0Ӯ	m*¢U.ù¢¢D7㍴q\n&̈́³v!\0EꡫN˦gª7R㎇r壮/Hø+禑rz*JDC¬͚jvM߮ü	µǪ'԰ͺ3<位+Jüɫ點ͩÀ2#";break;case"bn":$g="ө\nt]\0_ 	XD)L¨@дl5ÁBQp̌ 9 \n¸ú\0,¡ȨªSEÀ0袙a%. ш¶\0¬.bӅ2nDҥ*D¦M¨ɬOJÐ°v§©х\$:IKʧ5U4¡L	Nd!u>Ϧ¶˔ö儒a\\­@'Jx¬ɓ¤ѭ4А²D§±©ꪺꦇ.SɔõE<ùOS«驫bʑO̡fꨢ\0§Bﰸr¦ª)öª岑ÁW𲫅{K§ԐP~͹\\§묪_W	㞷��꠴NƑ¸ޠ8'cI°ʧ2ćO9Ԡd0<CA§二#ܺ¸%3©5!nnJµmkŚü©,qÁᭋ(n+Lݹx£¡ΫIÁвÁL\0I¡ΣVܦ죠¬欈BĴúРª,X¶�§§ά(_)죋7*¬\n£pֳ㰀2C޹.¢#󜰌#Ȳ\r7츍󨡺c¼޲@LڠܒS6ʜ\4هʂ\0ۯn:&ڮHt½·ļ/­0¸2ɔgPEt̥LլL5HÁ§­Č¶G«㪟%±Ғ±t¹ºȁ-I԰4=XK¶\$Gf·Jzº·R\$a`(ª癫b0֊zʵqL⯜n¼Sҵ\"P«Ĩ]xW˽ÁYT¶º𗵋e䁞µ}*P©񹯖u*Rª·¤bX¥µ«ԥ¢ݔО5h֙õ¬O!.[8¶䜮Ѐ刔<¾ S̅°\\bѶr8§ȊE(魸º٭ƫĎ¼+¤^,@'nE)\\ݑtW¯Zù\$z·+¯\$D¶¬\$8Z¯­˱d§㕓ZCڷFLOؑNC	Yþ┋da!˳Aº­AB䱹~ǫg⫪\r¿Y(աI櫉MǕW\$Srj̟F¦sŶě��G4@\$Bh\nb:è\\-^hԮ©葍¼ˬMѳ曔mGǺЈÿ@/r⹍󘝰¼£ô7cH߸Q>񋔒غ@SºwÈr<¼3`ؓ**+ي¥HĜ\\0%¸\0¨ϸm!¸<\0꼃¨cgĹ`ꛁ\0l\rᝦ0X|Ô!0¤ÀA\r`mIԽ朮TKЎ\n­5*q\n酺;c¡ጇȳ>P꼒h !䙋Û󾡑6\0xOÀ��蝃s@¼x싃\\	Á7p^Cp/O:?)􃿩03À^A��꭬v\nꝲ*D\$8«!n흻 (𾉽fǠ¦oqvӘS©úG¡B(`䋟hp\r0	DFhК#Tlт9GH읣ĺѰ9G遟ߴ~/̗\"䏂Hm¸6Ȝ0飤ㄓtþöZ}'a\rg4¨\$ن¢𮹌X·)¹VTW;غol¨¸Dɛ5bø³I:͔P\r09\nüÁ\0w=° 1@ۜ"¨r¬´0id¡\$ТBĕD᳡d0͐@夞\r!65tڎŅL╥ي;GDٝ@ Ӄ.ʣZú§ªhÀ䬗{ªIPe赎ҹ)Á\rùŪ#罧¬öퟨ�\0rȿ'´ûM!Pw­喨¦ɘ|£@sPp¦£ù;ppй¨UDO補r4x܈(­*<0ŸSʚ¡⠫\0FXj-½ʪªqԕhªG2쑽b´õ%¯,쑫RgT	±՟M¤«@E«н&I?]³T˄9BܮkDlʶĦS!s✰dL)W7T\nV¢3Høy;À2Zy궜rӜþ(C©񏡙7ص2£-MA'jU]T𑫡(h¾0¼@'0¨C±xa¥7ūsԒ#¤؟D2@-\rMm7±G«*`dõ¨\$b}ꋯqƒ·ȬJĮÿ鼛Ӭ7ǐAL(À@«h = #J٨iJ༚Ha㎜rõ7öhʌ1!ɀ;̕Q ¦(LjQ:,耳³((=JZ²)²÷ҩ躦¬ݓ4εlܧgÁg8Á\"*ɭsڒ㔹\rӚ#N+§܊5p;YW¥݈\no𶂼(CkB4jikL㜁¤3Aٚ]B6a\r±]>٘lB F ᳆úK®°Rɋ-굈§g5aǯŗ>´ې:Z':'H°^׏xý棚阬;㊐H«3ú\\ܜG¬ٯQŭz¡W疝u*% À(&�Q5ӝЭx£>짒⦥x^󲮉>{jvܫ³I��§W÷곸¿X4¨]ep䋤V6U8&eVZSzwN`+ªǙ²K&0®meD¸·圓Q[թl,ퟵ@¾:/÷ÿ¤ʻ¨uo冕+>qP/\n튁º}킊#֪ˊ®>²JꜜL۹UZջº1&«»x¢ªR";break;case"bs":$g="D0\r̨eL瓑¸ҿ	Eó4S6MƨA´7ÁͰtp@u9¦ø¸N0Ɩ\"d7Ƴdp݁À؈ӌüAH¡a)̅.RL¦¸	ºp7Á棌¸X\nFC1 Ԭ7AG��稕¬§¡ЂbeēѴӾ4¦өҝy½FYÁۄ\n,΢Af ¸-±¤إ3NwӼሄ\r]øŧ̴3®X՗ݣw³ρ!D6e௷ܙ>9ృ\$яНiMưVŴb¨q\$«٤֜n%ܶLITܫ¸͂)Ȥ¹ªúþ0h螕4	\n\n:\nÀ亴P 滮c\"\\&§Hڐ\ro4 ჸxȐ@󬪄\nl©Ejѫ)¸\nøCȲ5 ¢°ү/û~¨°ڈ;.㘼®Ȫ⦲f)|0B8ʷ±¤,	ë-+;вt©pªɘHǋ 矑°닧ʊªB¾ˁB¢ڵ(͘ԏL{,œ˓I脑ᅜ"5/ԥ!IQR¼*ÀPHÁ gR)tüƭ£<°14ͨβ#ꦦ&2ʚrÀ5l<°¯㮝\"th��2%𜢘;O«¢X=1\"޴®ꢣÁìXيŘ¥ªꊲ¿Ԕh9\\HEɥ1捫ҿ4ݗ\rǤޑ\nM|ݩh96\$Bh\nb2Bèڗcδ<¬õb®¢B#h¿´񫖹¿ûn)±(啿7cHߜ%£樜r󰍄'ò«7/ꦹYե@�)>p:cT9è؁\r㺊9襬5r⿴«7¨8P93RR2½*4MC²у:ûµc6X(£8@ û´y޲₴2c0z\r 踎aОý(]񃐜\¹Ờ§	û靅ᐽأüHx!򜜫6✮՘QhΓC97µҸ'p¼Rþ£'\n检҉,γ<߻ϴ=J;��þõc[׌¹³ö	#hӱp讝봋¡¡À@Չł¨95r¬ÿ¹s_h6¶Pꍑ+9֦ػç\$qÁݙû晱D\\4\r23vf½ګ_l-6hTA}\r!À@ޡξܹⴟ	ÁH)𧘳( ,©\\D GDȉTAa%Á\rhP⠱£4¦Ԯ杜rY´A(@»À+GD·~͔\rժ½p䉃¹³qÆw:¥Cᄔ&^¾;Đ!0¤⦙IùuE`Ȉz5°ĶUTdڹ鹏ŶrՃaRɚ1&rzsLA+􁂄0@Й½;ʉDӊEC˄蜸!\n9²FL8ST1ÿCn1Ԅ)vɢQ踶ټªʉ@'0¨ȣ\"ʃµ⋃⡃q␴h²!	2W\r*Cpf!D2³¢¬QޙS>}436¯Oڌ%%¢©bQ	2J@B0T\$i¡¤4O94󲣈	&\r!賲rQ̲,©F+úEꃴ\$Җ]Uu*rµRɘ=²4`u`+ݢւ讗埑¤JʮذCKÁ°¼܊;YBut¶AӐkEᳯ\n¡P#а˜\¯<d¹J½ɹ4 n]¶v+ ²NL휲h´V¤A(.L0rRٜ0eCfؕSʡI񐜲󔏆¨.wڍ16ª✏¥/pەB|fԕI¦RӔPтCa©m\0_ռ¨0ڰ®҃¢ª4¶d®A#뾼Eܷ\rÿ2vߗúퟦ�f7搝£Vª¬0j1Hf�jꅢ°5»В\0";break;case"ca":$g="E9j楳NC𐔜\33ADiÀ޳9LFè¤5Mǃ	Ȁe6Ɠ¡ʲ´Ҥ`gI¶hpL§9¡Q*K¤̵L ȓ,¦W-\rƹ<򂥴&\"ÀPÀb2£a¸ಜn1e£yȒg4&ÀQ:¸h4\rCࠒM¡Xa 竁⻿ÀĘ\\>R񁊌K&󮈂vք±ؓ3бé°t0Y\$l˱\"P򜚠夸霤Ě`o9>UÞyŽ=䎜n)�+Oo§M|°õ*u³¹ºNr9]x醎{d­3jP(࿎cº겦\": £:\0궜rrh(¨긂£ðɜr#{\$¨j¢¬¤«#Ri*úhû´¡B ҸBDªJ4²㨄ʎn{ø谋« !/28,\$£à#¯@ʺ.̀ʨðƴ¯h*򻠰ꍖB+ºɰ9ȋ°!œü포7\r3:hŠʚ2ao4эZ0ΐ苴©@ʡ9Á(ȐC˰ӕE1ⶅ¨^uxc=¥쨔20؃úR6\rxƅ	㔊ȉZR∇3єr9gūԶº²ͧ0e	a¸ P¨«qq\$	ϕI¢(ܗ2NͻWRvÀ˭£¹oP¡py0oµ봞��_q%¶9[¶üҲ@	¢ht)`PȲ㨚cL0¶ûu¯Pu&¨EꓯY¢£\$ٜK£7bb&Cªü6L\0SFҤ¨螳Э+¥�99ꝲ7R·󠪜rꢼ70Ӝ$:ٴP̅\nퟤ�ʰ㜮򣾕*l7Cc(P9.µR©壅²򢪠£Z\n3f𣼐#&öúڲ£\$Á⨴20z\r 踎aОýh\\򩂪3\0¯OdTA÷pþ;Áްښh£fӫ£ҹ?떺6üй´®̆Bküܜ$К1Xޯ2<Át=Kӵ=_Z;õü²򗅝j7v±3´Пܢ* ø!e6¥Ħ¥݆õ>a\rdt) 䘔²8/`\\҆{I(\\a\nºBQ/%¡#АGC\nþZ ;򒘈죲]��ø3i#\r­_öߜr	`h1¼fӜ"M\nv~ÿޑ0FdhTʫ@Z¤( A\$MR©Pù8Eú{pg6f¬֚򑏣Jj ¨,\0ޝ߃搣WÜ>ƪI\$\"朰001Ģlݪ 710¡C~C|>Á) ޓ` MÀ¸6\0䵙°\$ŞӔЊ󦈱_ARVҔ'BؔaHª-\n1E8Ia1	\$D<H৤!\rм݂)H	*?39ʻvځ?橚¶驂a²'¬(𦕈2>ĸ@δ´\nO :¨Á>͑\\/3V5Q_<2Ȅ͢¢VB^йeDэ㜮}ªÁ#乐p@L)p/\0@¤gR|ƓC4둡ȔÁ0£Aグ¡MMyf¡tWHyԂ9Sª9:d¼UPOSTµ\$«\$懆VaXI'ª𥁌*Yk9ü*\n~°4э\"\r0ÀVШc¥ꍬCmpP¤¬b£񵂈7@B F ᜯjyќ"¥֮׹̂ª`7õµkFk¥3֥&M«F򙡇Zl°¶ҨbL[ݮ叵£´T½1l±&¾z➭µ|7,\0°źv¹Ԋ[aI0a¢d靉ݤ^>wZġ=	PqI*®¤ۥj\r\0eT~٠Ԓþ}	�`#Jµ䑚#\nˣ\\ퟱ�@ïÀUDiĦZ\n䐎";break;case"cs":$g="O8'c!Ծ\nfa̔N2\r惋2i6ᦑ¸¨90ԧHi¼ꢷÀ¢i𩶈暴A;͆Y¢@v2\r&³yΈsJGQª8%9¥e:L¦:e2˨ǚt¬@\nFC1 Ԭ7AP艴Tژªù;j\nb¯dWeH衱M³̬«N¢´e¾Ş/J­{ⓙp߬P̄ܒle2b磌赺F¯øלrȢʻP÷7̄n¯[?j1F¤»7㷻󶲉61T7r©¬ٻFÁE3iõ­¼Ǔ^0򢁢⇩c4{̲²&·\0¶£r\"¢JZ\r(挥b䢦£k:ºCP莩˺=\n ܱµc(֐*\nª99*Ӟ®¯Àʺ4І2¹֡¯£ 򸏠QF&°X?­|\$߸\n!\r)褓<i©RB8ʷ±x䴆ඵ«n\r#Dȭ8Újeҩ­Kb9F¬n BDBѵ\$Cz9Ƃ 䖻먡A»勴.Ⳗ𢍀ף£ @10°Nӵ}Qӕ,¹CܷPÁpHVÁݵ5@ֲDIВ;<c*,0΀P2\"י½À洈¡kʌB}9¦³\$q@¢̀ڒ1t3nmۀP<'?¤CtIO¶°ÀM޶7ٺ൥󫠗�^p]ꍠג0¹¥p¹GϢ@t&¡Ц)C \\6哎B�ºﰔ-4۟ă®8	ș+0¸ܽ)ù´D¶+谍²w<	J3<3ʔ©´^«uЅ\r\rr²媄턃m^4#Hֺk峢úͦӅ\0õ³鋲4ú5pۿR\r²`ہ75º4웕Ӳ¸;Fղ҉ޚњ6;^;oW¾ÿGׯ¯p÷\r²8§¶M4V򻧩»򼎹Υv֜P҉²7M\$ԍ΃.ʬ®Mú%\n73x2o°¸ú@2Á脴¥¤ḯ񅖇£ªɈΗc^2\r谨4þ!xDQ踦84°ʏxaĴꌱzNCSTjø��dn/唑S:Fɺ[µ	70V򯨈!2\"j鐊FĆ°@õP@r{i渟伉E��û鼁¹û\0|Cjc©t7\"´/\0 aE䌦⠘\nc5¤`bd`TC)p҆䌛[BoPt¥I+YȍOUʂÀ#ǁ8§öiѰBPQۻ0ӃQ4­õԦ¨,Pi©̴²򞓲Gi+	rC䳰+aÁ3ù0À㈣ퟠ�H\n\0MIÁZ¸M0 @ ԐDR2呐F(g°A蜜В1¸ª��BA´¹򹚅贮3x¦ǂyȤA	ü%ր@ё0»²xS\nA´±	;fƇT&\\³y%ký¶\"\$q'¹奦p¦ù¨¥逢´Yú°y;LѝÁ´\$тSÁ©º³窄zȠh«\$P¥Kϼ䉸􆫜©F\$3\r³¼츐¼¾\\xBO\naPBÿG⢓fXߴ6l¼7��0iᔡٲjak~t°¬PQݙ\naD&RNU¦௛̐EGhoMĘ#Ifoɂ6(݄7r8¢±KA¤訋嶧ׁ¿g=/Sö lᏳነꤝC	BSYµ4J LüܓˏC\rYB4Q͚QBљ\"þ^ଳFiX*¸נ¢2¼­Ό¬B閒=`IXCȶ³¼PyTtVBܫUᙳ@��DսF6§㡈Gb͸eꛂ¨TÀ´PµȬζﴆrퟐ�Xaݖ党NºøD9Y6.=ߢDѵԄ+eøÀ&΋2*\"Qܳúꎦ ;G/¼e4ù9ZƫѲB¬Љ©´9ȖEhԶZvNٶ«?.,8x㞪lµRv]h\nez`az͂\"!\nyᬜ0֪²縁瀧Ж«{G¢À²2喠x²@*\$i0¬U喪§ø䛼lHÀ\n\nԁ¤q&¬¥9&ü侢;break;case"da":$g="E9Q̒k5NC𐔜\33AAD³©¸ܥAᜢ©Àد0#cI°\\\n&MpciԚ :IM¤Js:0ׇ#سBS\nNFM,¬ӸP£FY80cA¨خ8󨨞r4ͦ㉰I7铃	|lIʆS%¦o7l51Ӂr¥°Ȩ6n7��/)°@a:0윮º]te²륦󸀍g:`𢉭ö娸¶B\r¤gºЛ°Àۿ)ްų˨\n!¦pQTܫ7δ¸WX姜"h.¦ޥ9<:tḐ=3½ȓ».؀;)CbҜ)X¤bD¡MB£©*ZHÀ¾	8¦:'«ʬ;Mø輎ø9㓜МrBpʺѠ֦¬ºЮ㈘ߣûjµ\"<<cr֟¯K⼠;~¶ò&7¤O𔦸²@(!L.7422օ	ËB؜"謒1Mèγ¨慜rC@PHᠨ)§Nл,㚈ͧ¿Hڴ°\$2@Έ¬rʖ²)(#S𩎧ÀP¬¾\r ̩©Q𦕬򀀎t¶\nn׶þ:B@	¢ht)`Pȗ¥♆R۶銮֕#j2=Lrº¯\nⳁ7B0¢8\rಏ	¨܃\r÷ºOLªPَBȞ-(޳՜n©E¡P\$U06£¬b*\r񬌼£¸걌o泎¬��匌#=¥­jMêjaMö⁰P¨42I[mv¨2␈#&`d£򃜤Hx0Bz3¡Ћt㾄\$:[γẔˀ4ߡxDm«bb¸xCXöᳩ\$6'K³Bt7@ü\$#,BNߡh׮¯��Á§ª꺎¶:kºþñ쫚󴭃vպ©WǤ(𒶣͂[ηzƑhw⛠-\0@3§M*DЄ£͟l¾π浭°h|!Kͳ©>~#c|ºd.ϊ湲L໘漈´e¯Ⱥ`f(a91׾Khs\$倄9ЬPy@0卜¼*ԉÁ:2欐\0k𤡂\n\\᝺8֖׉}ɼ\"Ӫ`¹x.I\$û#rFO󳦬񗇔f)O3䔽1Ӎȁkȼ³úHw\r¤1Àe6fMõ¤`1ªAHe¤Є0¦0-,d\$¥¸^:¹y'<֒TK	qM3ਖ\r@oaϾ8sD.\rªqС2ބC˃ P`ù󩠠,R'¡ĺB±/i-,°ƇϬ©>'蹹9	BxS\nõ9ɜ$B¤¡X ½6:@Ci£䉅ȝ¡w(J4vOP,]NY|@ΝUk >GHù!(%,.À¦B`-A¨\0.#.񋽜"笚¡@L8¥pHºo /UC茆\\¨Ѻ Wyɠ«´ƃۂሄ¬¯¹¥\"ҒNРla­³򶞜"9р4¼>hMd Ҕ¤nøõB *@#Х置\$úJLP¦1qMDW詽a1©PHGI8K2Df±ԥJF&Áª5(acHñm²g:ù½JhX£~U\r>yуJF&¡#H¾Á3ᅱ񅶡r=hNC퀦|F	鵟恛§#xbȍi·ü+ЎaYKA֢ߛ]ªTZ󶑐T.ªĩO\$U_kù0D";break;case"de":$g="S4@s4͆Sü%̐pQ ߜn6LSp쯎'C)¤@f2\rs)ΰaÀ¢i𩶘Mddꢒ\$RCI䃛0ӰcĮ ȓ:y7§a󴜤дCȦ4え(إ窬t\n%ɍТ¡ĥ6[怢²¿dіfa¯&7Ԛªn9°ԇCіg/с¯* )aRA`ꭐ+G;揃=DYЫ:¦֎Q̹\nc\n|j÷']䲃ÿĢÁ\\¾<,坺��¨U;IzȤ£¾g#7%ÿ_,䡤a#\\焎\n£pַ\r㺺Cx䪜$k퟉�#zZ@x溎§x滁C\"f!1J*£nªªŏ.2:¨ºϛ8⁑Z®¦,\$	´0議£søΎH،ǋ䚵C\nTõ¨m{ǬS³C'¬㤹\r`P2㬂º°\0ܳ²#drݵ\rؚ\$ôǩh\"¶C¤ýHќ¼(Cќ0亁B`޳  U9ðڎö»̤À:¡Fi􇠢򒁡-SU¥ P԰KݪÁpHWA¶:¹bþ6+C¹I+ۘ¨ȣs7Bz4¤­F³ª+H±(Z#`+Z¬(行õ¢7\rԟ6#\\4!-3WõÀ¯ɥ纬j}7杌W򕀦cT½R@	¢ht)`RÀ6ՏB�·c¬>͊l`¦¯˺¡ÁIݖ цc£Ö\$f&G\\寴C 7ݶ\"öϡ²㸏ۘ-7C²µ!򖶜rퟖ�\rÁh¬B\D8A62Ҵ¨ bjþ М" )Ș:¢=« ڈ߭먶¾웥컊¶\rûs缮ԋI½\r䮝&z\0002?ɠ孙ª��­hɏ Ԫ2\r¨\rBȪ{D¿¦A\0x0´7@z+㠠9Ax^;úr5ܯp\\3蟲\$v ܗA󸁴½¶\rsLԷ!ްΛg㟧P:·뜰000©@ܫV3juE쾛´¡\"`䔳 Z¥Ԋᄒ¼ÿ;ø¡3<w򞫏z/Mݽ`䶞ӹgoy𕐼Chp-ﭜ¶𜻟µ ƉÀ´y5©Y	`䎖QO7 ¬fN¡N2/Гª@P¡L³ñ37嫕²^T!f챨:ù\n1?DpʀÈf:`8º©;k蘧B#Z¥M@16¤IӾ2鼇#¤baþ4§¥V䙻6*ퟕ�dL㜤h\"ɣ§&WyDÁ2GQ¢|!÷Hg\n9F¬[ɡCJ=Ͱt*n̜n񤯔Ȅ¦ρL#²\"m\nT aݺ7·rʼr1þBfRÀ*õ쳓¼NEȢXv킲&ٲC`)~_፻GlNI»~uDø d잒;E #@«K̺6§䡫ª]¢؅0®GöA;cn髗t »J񜣮øѿ򎆜nъnșh¹&	P	ጪӮAȉe7¦Ϊ]@z8U.`QʉKP´菚*Q߇RҸ\$	d%p꽣qvÁ¬¤唨5\\©D(ʬ¨ɴF£P(.JѤ<\$\r٘ipl\"ಭЎ¡ºƠ̺¥3F¿º`\nB󬌍R*kXlHe]ȦٚL½­p³Ϭ׀AQᤓ²þ¹ڄA\rsÀV֥䘘S±+т®ĒI2³-d#T*`Z\r,AGQ5񯭝Á·eÕ௺׳&lΛv¥-1[t¬;љFuKꃥĠ0«0dƘ||P¢LC \n5\$f7³®b/Hõº®ږ»آL\"Á&a4¢¥®˒R6d튲܃ɜ"f%¡6BX賕\nªf!FkEÀm»\n	nûiÀT0̰ٟ&Gp0@+8{hf2ѝʠ¼\0";break;case"el":$g="Ί³촛=Κ &r͜¿g¡Y蘻=;	Eó0朮g\$Yˈ9zΘ³ňUJ覺2'g¢akx´¹c7C¡(º@¤˥jث9s¯勖z8UYz֍Iӡեĕ> P񔭎'®DS\nΤT¦H}½k½-(KؔJ¬¬´ח4j0Àb2£a¸ೠ]`株¬޴ΰйsOj¶ùC;3TA]Һº򺡔OвɄ»¬紕vO١x­B¶-wJ`圫􆓣§kµ°4L¾[_֜"µh²®嵭-2_ɡUk]ô±»¤u*»´ª\"Mٮ?O3úÿ¢)ڜ\̮(R\nB«\\¥\nhg6ʣp7kZ~A@ٝµퟰ�µ«&¸.WBʙ®«Ꜣ@Iµ¢¤1H@&tg:0¤Z'䱜♑Ávgʃΐ탑B¨ܵø(乜r㒌\"# ±#ʐxʹ訏£᲎ㄚ9󨈻ۛҹJ¨¢x݂[ʇ»+ú º霜´FOz®³¦\n²¼]&,Cv欫¢⼡°­[WBk¹4µF9~£䬄¹/²µ/!D(¤(²҈@K«­C╖꼽A²PX¤¢J°P¥HF[(eHЂܚ;©\\tԃͪ¡%%%ڂ𥒪d«7½2Pقퟭ�دD@gFuӼ4Ȥ®ȤӇnµ͎QתûªKq8®\$􌄗cn4c¤霦;겜቉\0ļ(湾r¼\ns8(%Ȕ¡xH遌	 Ҟ ³²R^ª5ꎖ¶Ц±ښ¦Ԃ2¹Л]ׅJEЊ£ҶD1@Len򁌂	=¢©o򊠯ޢ瓎黜r摒�]棯»򘧩yQ�£'&qRğ[ֺ\$¢Ahẞ^⚄¯wފa|õ;\n󅧯«\"\r#ֶM렁2̣w莞§¤2Ȝ9#¾»õȟD`蹜$؅Ŀ;¯Q§	³䉾6¹÷vBù_YÑퟥ�Ġ­«¡7*힋觅|­uȟKQª+dR+\$Gc/锜$\",	sǻLS<CmEb!ͺ6򴽜\¼jБܤ( S	<!tJ ^rOΪ¶¸BT˅\n⦡bú𼯃\r	r򆤜VöTŃ繆<EԌb)((x£@ИRڴϐ:¾\0ܙÁ\0A´4䅜n⼁1\0xA\0hA3Є t̝𞝥\0.2B¦ \\C8/¡¸§¬¬@úW&\nÁௌ ø»xE^2삭õС\n b׾ꥨKøMJ%Ѱƒ@\" z%ũ+弄;¬Qoù\$\$ҢMIɽ(¼¢3JU+㞼\"菈`gJ!F¦%̻S¥7Ҋ|^<`)ªmz䶅eD©\$¡jEEÀ·TR[¢\rRgŜn88#C	<²Lj!ᜤXɀGPЛÈcvo	= ڙY¨a̤9'ƘӘsÁՈÀޙ䭅\r!д\nț޵OIȀݬljؖµ§ꣃ)[�ú&%<嚸:AɢþűuP%A_¤d9j|\0\0(.¦%p}S%%穂^倐C|R¡Kz̛Á\0pA¤;7pʙꅱOѦ§Pޝ덞õB&\$߯dsOՠVϳCpp©õ?¨䍃¸h\r!²ȀϦ²o¹ጰǐʝҒ¤\"PqC:p aL)`\\Ɏ±I󉈐¢hM¡+;󐧍a)M[i½Ӈ\nC l<ЕޮpX伈ӦPܧ¤¹B��Q똔ª¦a,\"S虑²~{	ª/D¤؆½񉑐3΃󃆌̢5/ȵal򭦈ü\n|W򆱪8ZHxS\nݏAu	ᔔԪ%VÀ`暰&H@ۢďP:¤o\$²_2Ȫ蟗1莖f3^5³\" _\rQTL;C¨ʲǦ%X0¢(m¥' #K12隕Ȉ¬ݑƱ,A>uÿÁe鮥띙g+DCMAIKD׫®يJ΅yÁ,Ҹ# þġl\rޖ¬jE²ڊ񢊔-ǆ¼¹³]µʇ&̫n½¸¡򈰎7s³\rҊߨΐ¨SQM úà+a²톸d¦Nɡτ¿9a	I3Á<T­_µ-&¦Y`Đ`¿:Er¢¾:-	¤ĎζDE­АÀª0-3[&SȦ[9촭Ą圯7¤6?A�)ꡙ ڒJ\\2q.¦U\ni£鱩A򎆳͋¦��1೑0jO!1э7F𧰘MiΘꑅönԔp6¦߹ºÿ´sӿ1÷᤬WqLht§D𬗩wqˍ¬zAش{¥³,¤vŹK쭶Ɛۊ«°\$TϧۧA휣¹Uù¯Ws寬­ҿ 񄳖ٌN뱠&ü֜/²̉PjV!eũ|÷¸埆X:맟圮4W򘸤Tϯ÷zb4|¦a\n";break;case"es":$g="NgF@s2Χ#xü%̐pQ8ޠ2ćy̒b6Dlp䴰£Á¤ƨ4⠑Y(6Xk¹¶\nxE̒)t¥	Nd)¤\nr̢樹2̈́\0¡Ĥ3\rFñÀ䔮4¡U@Q¼䩳ڌ&ȭV®t2紦̆1¤ǩL税\"-»ބˌM瑁 ¶U#v󱦂gޢ瓁ø½̣WɌЎu뎀­¾撠<f󱒓¸prq߼䮣3t\"O¿B7À(§´榉%˶IÁ砢©ϐU7ꇻє匹M󉊼9͊¨: �𦻭Ü"h(-Á\0̏­Á`@:¡¸ܰ\n@6/̂𪍮#R¥)°ʊ©8⬴«	 0¨pؔ*\r(ⴡ°«C\$ɜ\.9¹**aCk쎁B0ʗÎз P󈂓ތ¯PʺF[*½²*.<踇4ꈱhʮ´¸o¼)®ZܶHL!¸þʢ`޸΃|8n(偖2¨:ª<´ʌxJ2򼁴ݻO£ P󒭁 jXTÜr&gD¹ΪDJ¢x嚱cʮ3k[L,Ĉ©ˌ+\"8®x2\rC­ª9¦£sJĔC-/6ûT4儰´ȕʴƈꨰʴx\$	К&B¦ ^6¡x¶0჈º\nуp򏍽.u¡?©@¥󌤘䣎*њ<Ⳗ¿CdÀ̳ikóȷ+.󬒹͘ûQ钐VԈ¨7§£ܠے\$̎c0ꖜr:ҹ0÷b��ڣ¯@攦3c¯Qꦴ⭳℆R nϾ(ЍÏAk칀勑¨򆕇ІÁ脴 ็Ax^;󁴩¾Árܳ눟\\µ񨜗A÷P㭁ްێע¸Q ꃵд	¦NH汭ﴜnፐCJ&Lü¼%PH煁¬റpAƳ¼%ʲ܇5Ύüퟥ�=Kդ«ΏՄJP|\$¤©⶝¦6IC¤¦§Ƞ'!¬}˸8§貆#\$FIA*3ÁӀdhQhn¨@¨yƮܓȜFϳI)N̴+OzmIª5bõ	񱗡%'²wl3<Ϝډ)<+i!貈t#A@\$м#@ ¥A1dp´r¬Àcv՚2biIʣe¸:¤`-\rT;¨=wC0§© p¨! ž¹0%ퟣ�E:H񜢰衜´x^S\nAꇢ\ny8 \nʐ6d8򰥍U򺛉d*\r­M?7 nHܜV* ?\$6MCĵ\n!\\b«Ȑ!T𐈡¯ܘ\"Hyf3\n<􈂎i±永©B`mpo´ht^YȍµƲxS\ntþ&ⲇ 1m(¡ uF!tO魛gpLCc#Q1̷R£ÛldЍÎ^cUr\nFÀ¦Bb\0o\0\"µ\$d:4§gn)t`¦IY僫¦C 0xJe{j瘔UE½ᗅɞ®®V¸«I­q©x`+Mf+&fId®j¯D¢㖊Z©4Ԯ]θN؂¨TÀ´̙ܰj&ʕt瑎º策v°GkAYWu)̏FjHV1ķ󐚥S`ðy`e8«:9UQ)D˰6գ\na͘U8ǒCX-p^Q0t¥ܠdëob*2AKR¡¦EŦf¸\0«ÁfOP ª!*¤\\PjªDeԜ$῔¾¦夓6«ZVulÀdV-U\r¹O=§1	\\ޗqz¶«p*1«WԊ܈¶7~";break;case"et":$g="K0Ć󡔈 5Mƃ)°~\nfa̔F0M\ry9&!¤ۜn2IIنµcf±p(a5泣t¤͙ΧSք%9¦±԰˜NS\$Ԙ\nFC1 Ԭ7AGH񠒜n7&xT؜n*LPڼ ¨Ԫ³jn)NfSҿ9ͦ\\U}:¤Rɼ꠴Nғq¾Uj;F¦| 鞺/ǉIҍØ ³R˷í°a¨ýa©±¶tᰛ­ƷAߚ¸'#<{ː࢝§½ȉ׀U7󧳰ʲ9Zf¤Cƃ)2��WRO蠀cºҽ	궱jx²¿©Ҳ¡n󶐩\nZގ£~2§,X÷#j*D(Ҳ<p,⼱E`P:£Ԡ ΢88#(짡jD0´`P¶#+%㐖	詃JAH#£xڱRþ\"ÃZҹD£±\$¾½H2pӉȄ\\ߜrɲτ¾( &\r뢪Á0`P෎²/¡¨dþÁ7舤5¨*@HKK£#¢μ°S:°\\8b	󒎉\r,0LFµBҴKüPҎʴ|ɁB(Z¹B\\ȊRK:n7(ѫj7)%dª!ԺP¶7#ȴX\$	К&B¦*£h\\-7¨򮉩y6˱¨H6IJOpܹ °´Ᏸ𖜲ɐ߈¦¢dEʲ򪒷ò6¶{7'P\\R\r򠷳ë<Z1l 泎£b񀡃XӎY ³£/jq8¨S̲Rʙc|6h²Rɫ\n£D싒آᜰ7%1⩒øѴÁ脴 ็Ax^;퟇�­Arҳ𠞼ശ&A÷ ú큠^0٫4揮&I<ªhpم竣I­ڸ1#*j°¯zUK°𸗈0\\n¬Ʊ½o÷Áp¿\r¶'¼Oƍܮ\nb^¨D¤ڸ ²øܺs\\曯µúӸ©©%O~dü|ö%ſ4 O©Tl\$¤07\${C¹gōø&ʜ{¤Ʊ³vrbY㾫² Щ)|4Ѓi&A̚R Sˑx#(P2㜰ɑ!%l%28iՔ လ$dЫ¹0©P¤50ؙ=͠әࠨ\r¤ 聵㤜r`;¼\"ଓD^ Fü9 6si®}Ḹgvb]蠎嘱Á򎙛ࠁʒªmz4fEL0¦3©AGµd)㌫ñi\r®ÁٻrpN<%§­§H ¦½<4ꏩB(ѣ°(XI&XRL}4cñ񓭭Ă)	ZÁpꚓP T«񙒖e ]LdÿI]\$Á+V\$.ZºB¿H9.&4NǞÀÀh\0´Á­ 襥ࣱհ÷øoѣi\naD&\0̨§L**Ddۗú¶Ƕd¥⫎J>k晭Ѫ׍۠AU؎ʊך񓖡-oV舰u1s芒lKּ¬[IJ\"µ¦ڡÁ:tʯsdja\r¬57f²áK¢%ÀƖB F ჷJv«ހO4_9r!¤pɑºJPõ0¥\$X&¾ ҙȜn1m!%ҪkGªö«R֩ũƜn¨ ӌo졈0L±Z¢ˉø>¥ý@FПê±\rr¨횒bu¡ÁBdͮ7µQb¼×HB[XbkֲϚ9gU¤脨;;끣v4¸2ޔXu/4𒂀";break;case"fa":$g="ق¶ퟘ�²6P텛aTۆ6털(J.0SeؓěaQ\nª\$6ԍa+Xġ(A²¡¢ȴ힮§2[\"S¶-\\J§қ)Cfh§!(iª2o	D6\n¾sRXĨ\0Sm`ۘ¬k6ڑ¶µm­kvڡ¶¹6҉¼C!ZᑘdJɊ°X¬+<NCiWǑ»Mb\"´Àĭ*̌5o#d출\¬¥ZA��#°g+­¥>m±cù[Põvr泐ö\r¦ZǗs³½/ҪH´r¦%)NƓqGXU°+)6\r*«<ª7\rcp޻Á\0ʹCx䠈谌C沄 ޲a:#c¨กPࡉc¼2+d\"ý%e_!yǡm*¹Tڤ%Br٠©򄹫jº²­S&³%hiT孥¢ªǬ:ɤ%Ȁ¥5ɑbü<̳^&	ٜ\𪈌zЉ뜢 ÷2硊&Y¹雍¥MīLn¨ 3ûꘫn̶;C úˑl42sC'³I̈1\nÀI۴B¤¬i^\"ãȏ!ÀHK[>µÁTÀ¤��¹®Д!hHف«ü²DB:3S£¨\nӀRΫúû ;ú²Ռ	r됉ڃ_¾Ӄ £±¤¤§¦󄾘ƑqR¦L¥=Oj2l²_&˜r慜$ż«|¯²[\\ª	Īו㼀bԆ0⊉û;Ѱ\$	К&B¦cά<¡hڶ£ ɭG҂MT%o톜"\r# 6BA@ö¦ú2 ʷcH߮E)ݿ,C ؘ6I)D«&ꪏ&Fx䴵2ñ¶·Ҕk.Ϭ􃞀£ɋ¸چFńlxþI±<䥜"J񒂞˳t戣찮𮻇\\3?Ĩɗ]Ո÷%ʖ|³D¿\\ӹ!󄦩^ɜdI-ޢ.Kº\n@Ü0C#6 :믨@ kك\0ǯ룜$@4C(̞C@躎t㿬>ϷÁC8^ցzjAѯވ􂁇°3À^A񛆩Y£EpQi·+腸֚@ʻ±,-ɼ4¸·Rrt	P8dꫣLʒ¤+zwm9¾G̺S콏Áù?G읟ú\rȜ?׿Úk0|Áג8\$¬`©防ý6³gZ!!UH®(V¼S©\"*£B!ʝ±bf§؊_4D<ԨCk;؛\0bBÁ½ 䛃*¶!­\$:Úa:ɜ0؛ù쑁¤:A+P£Jy��lIÁ>4nYSꁉ¤\\B֖źB©/ä\n (#8⎣¡:q¬l\n^{T³c/ʜ0Ck񮄀ɞÁ\0pA¤õ´ÀϦg!C-%\r��8w%C>A?0sDr YaCCuDH%lÀir¹톷ݜ$P¥aꆙҔF᭭ºU´ퟩ�X¶yI(w²摺eh¤̬º7\0A¹S6Y¹%淎 ú, 㶯Qô	\$h<𪅃J¶Cdm­«i[?Hq¨ad^¼J|rÁ9N彙C({¢X暦hƑ±ʚE-¦D:8£%`Z)(L@Ն\$8ǜ\¦bITα↫袒yᴗZcF󸚙ۿEلWÀS\n!1֨V)mw\$¦璑¤զªF՚<\"cvاBs0뿕¯Jأ⠞QjUº&⬬ul C˶쁣©숬^õ^A!§÷;빕0§_5顒uj.§gIގȶº톃Z½W®/񏛖P)*@A·nq¾ÿk«m!EOc´ޢ0/a#糂u<Wq+HGqü6¦	;f}I3ºLZ;>¤%Uτxʄ¥µUϦK˘)ݶ⑧E?E^-S«]	.bid»£̺ݔqRVǈD0&\$\nԺ(ɆO)64pi1i\$x̞\\FR\rüO¢©0\n³8~y%m󘝴Á¹ÁԦ­X'iUOYù镍vKwil°";break;case"fi":$g="O6N³x졹L#𐔜\33`¢¡¤ʤ7Ά󈀊iͦH鰃\$:GNa؊l4e𑰨¦u:&蔲`t:DH´b4oAùԦBŢ񘜶?K¡Ĥ3\rFñÀ䔴<\rL5 *Xk:§+d슮d©°͉ꪰ§ZA¬¡\r';e²󠝋­jI©Nw}G¤ø\r,ҫ2h«©ؓ@Ʃ(vå²a¾p1Iõܝ*mM۱zaǍ¸C^­ŊvȎc㞄凃򹦨𐑆±¸´ÀK¶u¶ҡԜt2£sͱȐe¨ţxo}Zö:©ꌹ-»f��\\5\r銶)ÁjL0M°굎nKf©(Ț3¹À梍0`݆¼R2i␼\r8'©喜n\r+ҹ·ᜰ±vԧNⰫD蠔#£zd:'L@¬4¾êfŠA\0׬0\rr䨰jj\"8ޝE°L_¦#JlDp+ǰ6 ꅉ	cdȦ<µҸ尨.⮄\n£¬2¡¿P25㰪´¢SK1X򦱈ø¡pHԁø0 Sϋ飔&B;B(ܜ$Iݚh¬4\n¤䦭¼އ#K5´´:16jǄ¨5eµ\r-0˲5å´ø(ȝL[ŠѰ\\VUʹ5WU䁠KBj7=SН	¢ht)`PฅΨ\\-؈쮁V~ꄉCퟍ�]p£Mr׳iN=75¥µBp«wGB¦¢d\0 %񠙪Hº7ò`\$BXho<𺏁úڃL\n\rªfL2b79/sEC.طPԄǁ§KFBR򐏳©ł񪴎°˴Pz࿨\rޅjɦ²þ£کI¯죶Ǝ쭎ѧ¨.FؓЏ^⤮�;ͨ䱛깿켐*Βز«´@ݬ#Jj򍃟6÷d𑈺ɒ.cJٸɗ#£@䲌Á脴(杅ḯ텉?9ӘΗ®Ằۨ`^πв]#\nեB¶m᠞0ɨFr ḻöĝۏj.|楠ܠퟸ� 4즊.椐FA̄9轧¨³ػOqÀø n|ฆ䲺NÁQRþ㱅©L7¦\$]ʘe4Z%(õ ñlC؅?õFʜn_C塍C¦)\"��桛iݪÀب»»vh}°@¢9;ĵ¬GW(-MD¸觟ړPty3Z\n	¦ɔ6nX萉A	v]!+&8ÁB봈¶P²õ(yX/\0C?옜r=d&p´y.þ \"~PL!䷚璦䂃\\+±A\$Mº\$#¨hݟ ¶=񑫥¶\0C\naH#ҎxҨÀf/³ֈi\n4%`ÀҮ틹@\"Ĳ\n̲]Ɉm.¡΅E򨪔ù§_«¸´FAٱy\$t§PgÀ_K8õ°z訠P31¼ӱᱜn±IJPʖf«V5tO\naP±ª[(|󜮔ۚ洇Yt`Ѣ8̛nÁ¤3E8ʡS(󨚅g>	9Àrú\$0¢*e(䰣@ ;°dƸ ė!˸P\r,^JO̵@+\$䯕«Ȣ±fP\"wbJedgD֔K.yûﶨAMY%σxK´)¦\0õXlͧਡ¥@؜nͻֶT9Q¶°N\raC*!¨S)±ꙥ`̅P©;Aă0¤7£\"Э]÷Yr¼cU_lõ7&ĿA҂A!ʰfĒ®gyD&Á֘ p̩M®úߟڨ5ǜrǜ#ª£Ϝ\÷ªƍZ:𢠥O15¥З,¥Q¦°ΊД¢눝ܴʡJ]sō9¢<_¤¯@S�ɾ k͊6Ŝ\ݕ¡KΠrf¥wϑH@¸TG╁¢@άǲ\nJCKt漷¢��{/l;½܀\\߈r|o¢@#뇇®7¸ÿ@";break;case"fr":$g="Å§1i؞u9fSЂi7\n¢\0ü%̂(m8Χ3Iإ晁¾IĆcIЩDÈi6L¦İò2@泙¼2:JeS\ntLM&Ӄ  Ps±LeCȦ4え(쩤¥Ɠ<B\n LgSt¢gM惌ҙ7ت?7Y3ԙ:NиI¸Na;OB',f¤&Bu®L§K¡  õ؞󜲦Έ¦쭴罹¹g!uz¢c7¬ç�\\ήɥk§ڞn񳍼ü®뵒30¾𜳻 Pª퍏*Øܷ슘±ºP0°�2\rꔖ¨³£Bµp滥ãD2ªNՎ°\$®;	©C(퟇�K²ªº²¦+򊧭\0P4&\\£¢ 򸩑jùC¢'\r㨄ʣ°넃D¬2Bü4ˀP¤Ό£ꅈ윲ɬIÁ̎ӚӲɦȻ'\"dKÁ+@Qp窷\0S¨©1\nG20#¤򭫓녊ҳ؇M32䡰®ԉ,­Hؐ2cc&û¸Ȑ\r㚄:!-gZ֨ꎴP[҆¡xH؁Բ¦ȥ贉d?/晲\n¸¥¥)[OÀP§Vُ܂º\"m£d%2\nc¨ԝBҡZᬨƃ,}t7I³¥	쨉«ö\0ɅՍgѸB쪸YS᥈杨w蜰¾‐	¢ht)`PԵ㨚cl0¬򦦜rR썔»*,ႩZ+£.G¢詶§ƺRIª³UV¯0¥ͺø§Bԑ¢% Fלr²7\n¶(±ݘTУ®+ضշᄗTͣªSG¸b;~㈻>ۻPET {⇅ﵣÁµ3wȨܐݖ iӂ͌¨4А6đ¡#6\"8@ j oH¤«¡⺴2£0z\r\r࠹Ax^;úpÞ÷\3úP_dw0^߄úÿxl¼ܽ!E¾mST ڤ݋iTĂ݃G̐7©PkT '¨ٸ±Ru^2ay/-懇��z綷Csݪ(䬾2¨øpU¥X§Һɉ=\r©ы)I¡R\$Ȋ㥁Ȣ¤¨٩F(9¾樬J໠;¢ @¢\0rvʌ2«8p@靌k蹆c<LCy}31UK䄇	º!FT¤§¢ǎ#jfd°5Rr¡FeI¨#öBBH\np:¡✜ Pb¾c!\rĔ䤦ظù>\r汭rNӡ'́@XPPd]'AQ1RÀBI왿d F鸛-RHłnM!|y±\\Æõ>B(T\r᭥\0F<啂ªCö5põ3ҲKi!斁 ´µ-E!µ¹–ι)2p ɀ퟇�"*+AԳºWiÁsRjÜ\r᥆T¾eCzkȒ`ʇy¯l\$Π¿z-غEH\0¡>,mĳ&HRXø Mb¤2\"já='񚂳õϜ$H= ¯õûԗ𑒳rhᑄC曉¢\0¦˙¹H h¨a·¡À޵Ɂԑ²¶LQ	®`©\"ϳRE)}­)L\nM5䢦&ЄB`'Uª½þÀ¦ڝ=±»*aZ°±̪©elMöضD'쎧Lљ¦*lOlA7{2ÿX¹ڴ̬6»fǉЃ,A°4F_¹+²nUn!¾1֠¥¢o\r&¦݌6½-Q،q\0ª0-­Y PΡlݰ´䴆¨6\"ÀﲌVvù1ºý}\\ĸ\$4U#?I<RrW@Ht⦁W¼6}프vޙ嶀ҝ?&\$¡͐ESٌF°᛫¦Bڟ¹¦⠤䂏XlkE𴜂±³V֔Კ&ׁMFpϚvؕ�ڟü¸삥Oظ2朮R5f]婘üKΎY뽑زa͂؁Á3)ЭT\rŴB¤ý\"Т;break;case"gl":$g="E9j̊g:㰐\\33AAD㹸@Ô󙤄l2\r&ؙȨa9\r⃱¤ƨ2aBѼA'6XkY¶xʌl¾c\nNFӉВdƄ1\0悚M¨³	¬ݕh,Ѐ\nFC1 Ԭ7AF#º\n74u֦e7B\rƃކb7fS%6P\n\$ ףÿÝEFSԙ'¨M\"c¦r5z;d䪑0·[©¤õ(°Àp°% n#ʌþ	ˇ)A`癕'7T8N6₩ɒ¹°hGcKÀᘺ&𑜮򲇓;ùT珪u󼚕\n9M=Ӓ¨4ʸ肎£K湎눈\nʘ0Аꤎ¬\nᎫ𒲃IY²J¨欥r¸¤*Ĵ¬ 0¨mø¨4£pꆖʻZ\\.Ꜳ/ ̜rªR8?i:\r˾!;	D\nC*(ߜ$V·⛶¡ØҰƁ\0Q!ʉXʗ㨀1¢³*JD7ȘٟDӘ¦¯ Sݜ"<򴣫蘅Qðʙ1ₔ҃;¢´»A#\r𪂐I#p貄£ @1-(Vյ8# R¾7A j¼°¸Ƈ¢ª¢\r¦®3\0􌪣¾ sTG^\nc*Ajȫ몜"§-T2B;U<ȼC5X烐[+Z·ذޱ ޗVuu붜r뜰ԟT(³ʀP\$Bh\nb2xڶ☃\"蕬۳R*ܸwt(úB«%IMDٮb±Dꫂ½M՞ϲ­nӏ²k㪓R¨2´ҞܠȮ\"_讋?ėr¦豽®jN¡\$*ýLÀ*µr7µX¨':¡»ڳZªk:I®n5Pð䋖>ӥ钌.°ºlET²0 Ui ¨¾P荋R#8Aulꖹ £ªR0£C63¡к杅ḯمѧ:ü¯#8^Àꂺ§\"¡xDwϣ֞㈽F¬񻱬疷k,'\n¥-<᪻틽¦¼lõH®­;±5A7½2yӨ\\tOԵ}o_ضc¿j2vᷲ»C恛@DUퟥ�¡¯򉐠'¥UbOBSɄ¤³ė*僮)k£ ʘ!\$䤂#Tc㒦\0ؼ,͒÷u˔´µ\r1¥99O °̧A砐C蚉¼3=饻¦v¼؉¢,3W¦DϚ0ME؈��	@􎍣((*ɺ2¦ٻ#āU:S	7%aÀԚ¢лpC¨\nĂҔ2)G]¸§üQ:Ḹ6\\ЩƉ¡¡A ҙݚ¯\$1=¬䃸kl) Ԉ¡PfU\0ɉToĩƦJᨭ3ɄŇ¶S̩^I	*	򂷖9\$Gꬦ¨GބIHfBJW*J¢ٻǙ|fnINZα4BV玂k˜\¤´³r֯©2cF£Wm©®sдL㯋/°یHȕ¬4³ćs6lHvCm`Ґz'P¨D¡°닉JE%®\0¦BcݡǈrNɚL#Hص摦.­A&єHEPm:僗A4	¡¼ƔZªHjºõnDЈ4ơʚ¬K «E閕\\@TK龖ú֕f®m½&؜nÚq´1¸#H	)¸甴PVʹ+ĺTnŝ%˩Ƃ\0ª0-5WИaIo8u֒¨˪KɠAQhsɉd+tܛ³b@U[³KʒսDR䋶5 q=ԵAp§ᔺ¤ׁۗIE:ŐX򳃕֥\$øP¦֊ѝ鼇H(P#~fùAKpϪ5Aê«´¦ӯ܈-»h\r ­匞#yXEb;Eͫd7ùwK~oµ®]茶9";break;case"he":$g="׊5Ҝrt肄ו@ ɖºa®k¥Ǡ¡(¸ffÁPº®ª Е<=¯RÁ\rt۝SFҒd~kɔ-t˞q ¦`҈z\0§2nI&A¨-yZV\r%ϓ ¡`(`1ƃQ°ܰ9ª'ܢKµ&cu4ü£ĕQ¸õª §K*u\rΗuI¯Ќ4÷ MH㖩|õBjs¼½5⮳¤-˳uF¦}D 3~G=¬`1:µFƹ´k�)\\÷N5º��¤ǥ𝠨ªn5糰ʲ9΂ѐ´0'3(ȯ2ĝ£¤d갸x¾§Y̮񌏜"O¤©{J顜ryR £J º\nҔ'*®êʈ¶¢- ӯHڶ&j¸\nԁ\n7t®.|£Ģ6'©\\h-,JökŨ;Ʈ µ!ђ¹¨c1)!+h딠µȬVꥑ2֝§ԣʉ4'͜rbkͺ{	1¼µ40£\$ƍ\n6 A b£nk TǬ9-𼤃°)ퟷ�򠐄°妨 #먴ª¬I ¤¨d㋵󊡻-rʞ褼\"	­< ժTRlw¨ښ/b@	¢ht)`P¶<ۃȺ£hZ2FA(H洍j<N𝸞O빌£À貍Øҷఓ(µµkؤ:\r{&(\"û\\µMpJV蚺½MԺk%i޾Á³©m֝À際e¡b¤Á⌞XXp|ûbõ\n6J1N)z挓¢kÀҔ£ȶ#s¿ǈ2_Jҡ\rʳ¡к杅ḯ·ږ©«<oΗ{߻ܗA򠄱d踗!􄄋ͺpħõfH>³3譫̎3_*6h:vsNfҫۆŲlۆնmۆ媻ᶭ¼o÷�ÁM+:'eħ	³_ͨ ¿沣O¤{ѰרS«]밐:¥ø°¨4=£Ǿ\0`@1=£¾3<Ch˿#5þ°cgĹ`꼃`o핷蚁=«½ý\0Ƙ#\0o¡64]3Ě⌗½ \n (\0PRÁI¦R옡°F¬úڨg!¼\0䚃³ퟲ�ýÓ��󜲧֎@#继¶\$µ𦿠 J-ࠝOٽ?ቿpКCj³¿3ۗa§±2÷C!ǵ*1²LºīYb\\»c (ZѐS)i*pс%뙐򔏁r!¦MVI\$E,å‴d샨rlĽ@ZZ´qbzKTúo'iYՀ5̃ӄ\\i>II8īƠxS\ndRb%ѳ­a%Ld¦;՛RxkT¦HÁl¤0iΠ&÷&gUpW-@#HZIM灨\$d)c;Բ`Ɂͣ¯q\$жr`µF©幬®í -£¦v®(󢄽`sIK뎏ȕ¦󚏓T#ĵ)N愭되Iid򠔍!k3²²b,A0-\núD«s:ɣÁ¨TE­#FQDv(򛦩̤z\\´	\\Ճn¤,%Ȱ¬9¹\"©-|F%<¢@KժT\$r¢GD~]TV£dC«¬IeFI¨-§«¦ycGɽNN¤¬X��iГzʚH𶔺Uyü�³-	!ҷ6\$@";break;case"hu":$g="B4󘀄e7£𐔜\33\r¬5	̞d8NF0Q8ʭ¦C|̥6kiL Ҡ0уT¤\\\n Č'LMBl4Áfj¬MRr2X)\no9¡̈́©±©:OF\\܀\nFC1 Ԭ7AL5堦\nLLtҮ1ÁeJ°÷)£F³)΄\n!aOL5ъ�L¦sT¢Ö\r*DAq2QǙ¹d޵'c-Lޠ8'cI³'뎧!³!4Pd&閮MJ6þA»«ÁpؼW>do6N行n浺\"a«}ţ1Ž]܎\n*JΕn\\t󨻂1º(6B¨ܵø㐤7I¸߸㚒7*9·c¥঻Á\"ný¿¯û̘В¥ £XҬL«玊zd\r謫j蔀¥mcޣ%\rTJe^£귈څ¢D<cHȎ±º(٭⃿\$M𔣌©*ٻ晒9ʻF¬¶Ѐ q󂪆r䈶HÓý\$`P0ҋ*モ£k肏CЀ9\"M\rI\n¯:!£\"HKQU%MTTS PHÁ iZ P¸t}RPCC±Áb¤\r˛úpb¬PXµµ¢%¶oûø;´Z6-¨?δS㠌㈔!»Ș؟4uҘ6}Nϛ÷r\rwȖ՝񰶬øپ¦·΋~_؜06 \$Cݜr²¶<䃈º\r¡pȸ#¶6\$²¢ⶑ`A3㶠֩噌£²7cHߠ&⢂큉KӵKZ7ò0͗M­G{_p4a\0렎£Ƃc0뜥:伦=Ä.Ꝅ6®㪲aK\0®W\\úQΚn*5PIﰀ ´+º5¸z¹硢b4)0z\r 踎aОýh];Ẑ¤°顜rÁxDw-󜞅㈼㬣X!JSl5K㦢ʎ£¥)K 5KûÀþF\r=Uz8\r*DDs͏CѴ½?Sյ£¿_ʶAwi۷¹Z¾)ø\$Рm`tx#4E͉:04؎J6\r¯%吂P\$ ´;ĖB9r*礭ǌJa\rÁ¤㟃6L»h`;TröHȲȰɪ \nl͡µ6ÀޛD=3G\0֝㜤깡¤0À捂qw/.¤d·¬a2}t°b®°LឯlQ»7LH\nFs¬\n\nb+d|6B¡˒ fÀٛCm\nUeDᡢ``w.N,͔(AIsC­\n 4kKºNCÃÁ\r!Ҟ©\nO©¹8'#´e@C\naH#\0��%B̗\0¿廳-3昐ҵ'螓․JѝQ)H7¥Qʋ뉉7³&g̑間pDCɧ-䮂8E 8S\nR2\$Qؑ¨¨,g\0ᡘR⌢9\"Á¬G¡0O\0.̡ΎqK'sΑAʺ@;ڿ²Ո̈򬦎용ᄛ¶X訢`)L©­6ģHöVLȮ\nP\$WA³n<-Á,bD沣PU院L涞ci©7^õַr²阜r{Sõ¾⒍X|(õúÈP輁]\r!C²cMCe,R~f苉¸Fª\$I'§²ނ¨TÀ´3W3?pg¯J3²{\$ج¯,\nڕ«p횷·¶ݜr܇¼G\"\$'~¶Μ3£¥쾥cÀEÍE擒¸`¡a¥E0䡑ú[j\rzQۍz#A84ի󖅧1A¼呂&,ɥq/j����Hby<𙂭ﻆõ\0007㰯T(ÒÁ̩S@hդ;x$o1>&=fZ%tUJ@<[múH\"ª鞞2cuxkXÁ¸øBúw\rᬵἻXµ𹡔";break;case"id":$g="A7\"Ʉ֩7ÁBQp̌ 9¬A8Niܧ:ǌ擀ĥ9̧1p(e9NRiD¨焰Ǣ擉ꑪ70#d@%9¥²ùL¬@tA¨P)l´`1ƃQ°ܰ9ͧ3||+6bUµt0ɍҜ¡f)Nfו©À̓+Դ²o:\r±@n7#Iؒl2攼ԡ:cվ㘺M±p*󫜅ö4Sq¨뛎7hA]ª֬¨7»ݷc'ʚöû£»½'¬D\$󈲘4䔕7򇺌 䯹KH«¯d7沑³xᨍƎg3¿ ȖºC¦\$sºጪ*JHʵmܽ¨颜\©Ϫ­ˠ芬<Ҏ퟼�¨\0Ε\"Ȉ¸A\0©rBS»¸ʷ£°úԠڠÀ&#BZ\"H贁BM9ȜnԦ¥c¨օKª-CjrB(ݡ\$ɐꅌ4揩ȁA b𚁂q&£ʆ굢¨䛯κȢh(²㈐׎£ʶO[)£ 댉V4ÀMhR5Sb!Jҩ 䅯cbv²jZ񺜢@t&¡Ц)Bسa\"蚶¡hȲRJJй¢\"��@@􄈵©\nک¬2ö²X̸@PُL;1ø̳-#pʺ%mҥңªd\r쌄݄	걌i泓ᜰط耦)㐲¡\$h@A³hڄ6㨐9*ZQX2ᜰ׾¦Ih¨ż)¸ͬ:­耠ý칢Ȋ%\0x°̞C@躎t㾤(yҐ=8^¨,¡xDkȓz㈽|BXĽb@˘pÈ¥²낙¿O㽬H2¿ú£iV§j盛(F¯¬룶·p£ן,)𒕳\rȩ´mV䂴\r󬟀帛򔠨𨵋I\nFᦃK5&񠒳eÃ0{;²õNɥÂ(W>ᯞYaø'\$­£¡\0ǋӄ,!qwR:¤·L¿_3ݜn@ 'Rm<姁B\nJyl0\$´!U챙³«2fT˙ }Ðt&改 ؃ûx\$ ǚRȋ	ce¨~I[~I´;@ƉXøgiDЧ¼'ĘNª÷`¬ 0¦4IN­X)´gվ©¢(ơ·¬𪛐P P幱!U߄KI¤��P\r!¬ !RZHxy1�P懝Q¤&꘸R`Fñ眲¬݈³¸jG𕒷xtzˀ \n<)BJ\n(l1\$¥QsºZ¸Á'	;RÁ¬¨򄛃0i\$	\n\rÙ±3̼¡\$ݒQ	2,@°T~䥶𫢤\"嫦TΥs(VI4ŝGӵݑțD Ғ炖D­¤ӈ_\n-c«fpIp䉑⇉IõÀVˈc\"Ŗ_d᜵.ý¤⚑¦,NB0эP¨h8ù&ù䛌&󭘓¹z@PGn耎±õi\\¡a<£r¥I\n\nJ^v\0£ꙎۀѴɨ\"ªꂼ(%٭ČL%\rƜ\0»¢9ÀPL\r򴶞޻*͛£¦ø锖ن4¤)¯ٴª¤%藩pʱ\\%)=õB 砂}0ʈEELº-¦'^ú¢R#`";break;case"it":$g="S4Χ#xü%̂(a9@L&ө¸诐¦ÁҬ2\rƳp\"u9ͱqp(ab㙦I!6NsY̦7Șj\0悖c鄊H 2͎gC,¶Z0cA¨خ8Ǔ|\\oͦ㌀N&(܂ZM7\r1㙄Ib2M¾¢s:ۜ$Ɠ9ZY7D	ڃ#\"'j	¢ §!© 4NzؔS¶¯ۃfʠ 1Ɏ³®ϣ0ڎx-T«E%¶ ü­¬Μn\"&V»񳝽Nw⩸ף;ɰPC´¦¹Τ&C~~FthΖ´s;ڌޔÒ#Cb¨ª¢l7\r*(椩j\n ©4둆P%¢眲(*\r##Ѓv­£`N:Àª¢޺¢󮍺пN¤\\)±P2褮¿cʍ\rÐҶÁ)JٺHҚ\"¯H¸䬅0Рû¿#ȅ1B*ݯ²2n\r뒊80Iȝ/ÂrȻ#؊¬Á(ȐCʨΓĴ¨C͜0A j¡̒ú³¬cp⺃B|´ꥎT ̓[_9S«ퟩ�(ü^¿	㻼:,2±­ھ73��\n>-uª䗏½qR£쎪%£\n4А\$Bh\nb2xڶ☳o\"蔫5M뤽PLSZ¨ÁШ-x޷ʼ@©ªIӪ469@S ɜ"	޳Δלn°L´¦\"°؞MCˎČc3¨ٲ¸Ac@9cCµ׉,ú6· P9/㉘¸dr:7±r㘵£¼ՌךP焂ɘMcM¦¨ФѡÁ脴U杅ḯ³֖ ÁˀΗ¢¡{ض7i ^۝ַ᠞0؂w¤)M90ï\"Ȑ䚦)޷®钩«¾ɜ³a􄽫ֹ¯l¦ŲlۆԵ훶෮⫿v	#hЎ÷𐼴Àµ¸/¬Ұͨ²Z&p¬<³0ðI\n揥m2«\rá\0±£2Ái#);#7.ø㸾Bds0A󎃃Pሙ!n}/¤p؀¢ýze93¤#㌱;?乗 øIHP	@ø朋§漐@b(\$´!Dֹa¡3A¤Β<ิ5f¨§JúChe!+ÖL!;㸜$þİʌʘ?O씆7ü̃;`O&pڠoy!0¤ ` I¤ö10\rÀŠҁr y״cpP0Dtʖ´û	AE\$\"LS¹U;¿ظ#¤6´֞뚼M\$¡3Q±h폜"DF­A\0P	ጪFज़EC뭹>)E¤Ts&)	VCDI!䌰©ՠÀ<^\$¦¬§Ğ` \naD&,0T1;(r¯fL91\$q:M@ӹC¡<±eE¨´7I촓񞧈⒂þG!\$aª£N˕¼ø%\$¥³Á'©¸_��UD¤\0\nʨ3\\¤ !¬øxԛd3몡´¼·ȉhFAÁ´ԋ¨TÀ´/Cr^᭏¥¤Nc躖K1§B¼ĉ΂¹DLQ%¨¹\0¢𞃰yZ疊&À#0´Ҵ#²vգ\"-t²ºSbûL\r5/*L20\$3Ϝr󚚄SKYBe©=+¦býB~0\\P0S½LX&.,¡ ¦\"C!̌¶OS˻º¶\rGV뗋·Cv毖ú¦«=~&񖆰";break;case"ja":$g="嗧ݜnc/ ɘ2-޼O¢ᙘ@瓤N4UƂPǔŜ\}%QGqȂ\r[^G0e<	&㩰S8r©&±ؼ#AɐKY}t ȑº\$I+ܪԃ8¨B0¤酼̨5\rǃSRº9P¨:¢aKI Д\n\n>Ygn4\n귔:Shi걿zR xL&±Χ`¢ɼ꠴NƑ¸ޠ8'cI°ʧ2ćMyԠd05CA§tt0¶ S~­¦9¼þ¦s­=׏¡\\£݋õ땔 ﴜ\m咊t¦T¥BЪOsW«÷:QP\n£p֗㰀2C޹9#䌣X2\r틚7\0柎\\28B#bB Ē>h1\\se	ʞ§1Reꌲ?h1F렄zP ȱB*¨*ʻ@1.%[¢¯,;L§¤±­穐Kª2þAɂ\0M屒rĚzJzK§12ǣ®ĐeR¨iYD#|έN(ل\\#咸ШᕸNOYs±ùI%ȹ`«trÀA輾A󬎛¤ª(ùsD¯䙒ª%䕇'u)̘ᎍEª9^תEJt)΍ѴxNā ú«كEH÷dܡ bؚ§¥!8s]g1GёцЫɐ[^\"򅒶¸t%Á̅?4rU¯%¹\\r呈]/J	X֧1n]ٰI2\$甶弁ҘIe¹y~ˍz乽,EҔ󽧳ص1ÁҰcΤ<¡pڶàȪU7ú?V3ۉ!ۛX¨샖ʲܹ#~瓐5²9p 䒴Á\0¹5x̳\rHܲĊ]smٵP̘¨7µ㨂7!\0빎£Ɯc0궄`޳񃘘ݎ\\肳<PAۄ¶蛅®P9;řɐ\\­ª50t3l㮨7ᜰ2w|X嗌{¶貁\0x0µ ̞C@躎t㿜>§ИΗ£p_\nm#¦꾁>ņpxÈ>q¢앑񮇜n³h¢pO H ¦5ȫ刘V´:3 R H̘&¡ۑ\0sDHڜ\\"%{π4>'ȹC꽏¸;¿䵟¨r~良7򝛰/EDڜ\r°m!҃À˖ o[¦𐹠֫JAiņੂਂ⎈b|\"O2·YLö¸S\nÀSȵ1¿欈¹µuև󃔚[¡3B��2tΡպĜr\"N!»\r°9´9a¤0À泑2Fٜ#¤ A񠬅\0*1Fh՛rCāQ!䎛(¡[ۓ±\$É	VL»4a\r»8¹Mٯ6&̚pʷP貎裡t3+]Pw粁8Gnn\0sD۠cppw¦Á¢0䷃¹Ōa¢2ιF°1㎨¸Sjt\n F-xA(¥c吂5³GRED夗&Ĝ9Dx¯ҘU‐Bªbdȳ'BL:± Qø±	úPۉ0唄 A,Ō!E2H��,\\d\r+tס\$£ŷN8SrC2\n\r¯J#½پªBRv¢psO\naP5Ң«A&¢ Dr[¥3򾓒pUDXBt	ȠE¢E¶QЪjkª5Ɯ$_kª̪¦fӑToS񰔆\0¦B` ӔGÀ PpU¡ۅt<�rCH ՠƖ´VՐBHr󢈙餩·]i-H즅 撊ퟋ�"TV廂Hsc1½붳ޛ׾/p\nmø6º򚃘klșퟞ�[§eA¤39ؒs5Ĝr¯9ѧlB F ᴽĴc¹lA񆧕͋,W䀑8_ퟏ�b�ĉ¡612𩢵:ͬPtaDsp粆Hʩb9©)&ʆDɐ²>悻gܗ~:񱌆hUf\\ϚH0¿=g´\"ªH.	鿜┇¡QĀ擂q¶Øx¡púLK񊥣僬%o񊎙ĳcª,¬v^KѪZ单λbn¢X吂";break;case"ka":$g="ၧ 	n\0%`	j¢ᙘ@s@��#		(¡0¸\0ɔ0¤¶V 刴´НAƤ҈ýC%PЪXΐ¤ɤ\n9´=A§`³hJs!O㔩̂­AG¤	,I#¦͠	itA¨g✰PÀb2£a¸ೀU\\)󛝂'V@��񧬉Ր¹.%®ªڳ©:Bă͎ 蕖M@Tثzøƕ¥duS­*w¥Ӊӹ؆yOµӤ©(梏ƐNo꼂©h״¦2>\\r֥��;7HP<6ѥI¸m£s£wi\\κ®䬿\r£Pÿ½®3ZH>ڲ󾊻ªA¶ɺ¨½P\"9 jt;°ˌ±M²s¨»<ܮΚJõl󢻪-;.«£JؒAJK· 衚ÿ§mΏ1K²֓¿ꢲm۰²¤©ʶK²^މ(Ӕ³.Γ䯴꒏!F䛮L¦䢚ª¬R¦´�ÿºjA«/9+ʥ¿󼄏#ʒw/\n❓°K嫷ʡLʉn=,Ԋ\0u4A¿̰ݥN:<􇐙ݮҜnJǍxݯΓ,H«0鰓бꔯԵm(¨V˕/VԽwYȖ<X§5©QU:Kÿ=@k;㙄Od@¥Gu򋈜M̬¢C\"K©õ-?4] ¡pH߁ÿVM¯'À6͐ť³Yø¿%E#²PÀ6º±IÁµ?;ӭrø˖½Àÿďù4\$ª짔¹ob´!Ҁ³'0£f[傻º״´¥HTB,ԑ¢ֹښӉ艾·r\0݊O²V³Z¹¯*R·°7[Hº dmދ¢©Tʁ갧W-¬¶ÿ񻿉<Ī˓¢өո6ل鏚j¨>ꎵ¹M¦µ|¯u΍¥Z�*\\«ٷ䊩_ Eoþ)nõ;_^வ¹ֹöYꭢ勌Zd	z½©Uy醳F҂9=Ю>¢röǍR檥¾ö4ö㢐PP􏸏0# ڴè媩þ˞ªökǉø˳ZucXG<ÿ¼똹ל$@eÀ��蝃s@¼x<ȗ𤙁xe\rÀ¼2𜘃 iÀ¼榶ԩº#Į)S.xaμݸ򬋱ߩ/] 圣Sԣƨ뛸䓚˹H1[@BZؓR©μriùD=䫤Pzp	3r<·ل\rퟘ�X/`ܝퟗ�剡<)a<HTᔫE~7MC欋Ĉ틪}Mګw,£·:焤翝+¿wط¸꧉)׷|ɕ*ԬF\$υJĨ\nᔺݧ%:!،e嫑đ۪7u➋o5^-Ǹa귥񌢙:S匷7e&	'¤Rǰ±5*\\qŒQpõX«Ǿ ѹ»q,3õg<ً\n-윻朰p |uwߺ',5=΂Á;T¥\\StkQz²QĜ뚗C6Vk(K!ԭB¢<iܒ󯩑e£LV}'溁̈́鐴^T69׺ݢퟁ�RϑͯI6¯ٌ䠵)zGvIQR\\£��ds¦!Oc\rQ秙묐㖣ҡ4ԣ¦rGKp©Jo咖wþ:Vⷁ賴󮪩]|ɬǾ·ؙ¨Tt£µ̰'°û!~ۊYþq¢«|¨¨>x^¯\r1?\n<)I¢@YúƩ󝓒WP¯jµ⌧§q(쇨ʎ»Қ٣·vöߛTUV℧%bꒅg%Ɋ¥wz䦆Ų닀wҪ9ŋFN;n¡*覩[±weǄΟ«٧]ܥ䟨}suᰋSnG+¢¦¤ͭںcNº.ꂥ¢ YL֗čT·쒉�B¦쏚Ɯ"Ԟf =¸e 3þý㳔7lIǈ¤d¬RPn46µ IϥøA졇\nʘp儖򮔤pסv}WExSpª*ظ4󿅔ºĩe㑰呆s<q¨춷vނ9x¦M/¡oRü`ԓɎ65˝zy²I錙S}°哐;뒵LIVe[){sQ'њ;\"	<¥e򎶈¤Βذ,դaº㺍鞻Պ𔊕/¾³�Gm*۲뽆YJ¾F¶qõ¶lʧ#C4yǜ\2܆夺]µǤ%\0©̙־mЗ壧}¾&ͷ =\0´Ϟ²õ¬7j£2";break;case"ko":$g="셩©dHڕL@¥؊ZºѨR嘿	Eó0شD¨ģ±:¼!#ɴ+­Bu¤Ӑdª<LJАøN\$¤H¤iBvr욌2Xꜜ,S\n%ɖ圮јVA᪺c±*Dú°0cA¨خ8k#±-^O\"\$ȀS±6u¬ג\$-ah뜜%+S«LúAv£źG\n^א²(&MؗĭV̪v¶톖²\$쫏-F¬+NԒ⏶u-t曑µ尪}K˦§¶'Rπ³¾¡°lֱ#Ԩ��°Ӥ#ˤ£©`̧cI¸ϟV»	̪[6¿³塘M Pª7\rcp޻Á\0ʹCx䠈谌C沄 ޲a:긎H8CCÁ2J¹ʜBvhLdxR񅁀\0ün)0 *꣌םeyp0.CXuټH4夜r\rA\0輎\nDjù /q֫ż޵zøjrL R X,Sܺ¯ǅQvu	\\왺Ž'Y(J¤!a\0ÀeLԙӚøu½癤D¤×ETjMH	ԚÀEv喳%õMŠ婖U/1NF&%\$þ1`ږ叺PP!hHځ¬üY9¤½EBbP9d©֐[J³b0¤!@vd괔¶ⴙ±䔦vHgY<¿IWl¦\$jŴğ¥¥u|Iͫ;dղҥJ¾¬��萴uĠt¤\"س\"蚶¡hȲ/M˷Kr=y^쌅ɒT\"\r#06C A	Aö¨ĺ¦¤2 ʷcH߰(5ùR^à蹰²YڊZ³G´M[ve9׵Q*¾d*\r㸀6#p򐎻\0걌q\0泎£`@6\r㻪9兌#8º&)þ£®¼aN˾³{ûA¥:bꖨ>¹2`¨4q#\\B3j®»ȶ¾°:1컈ɇ\rʳ¡к杅ḯ󅃏悰Η롼=«ܗA÷狾£8xÈ>(-͈RkĔkH.@<Ą+®ڻI, Դד\n,h¹ జKچ/U뽗¶÷^ûἯ󇷒úòϹø?v¸כöPڜmkᑿÀlშt\r½dG⃚\r(­¸r¤£CӜ0H¤᪭4l선»��õl`;إL¡ɢ(²CfǹF圳sH6>Ŝ$Ě㎉@1¨Clhɚ#j]ᬜn (dfsAT&:Ár i~+e|ÁB<YұʈmǗú0pA¤ú5\0ΙVJ)Aѐ´Ԅќ$¡sިGY0ö*!zፖ9JbZ\rÁÁՂE	Ɏᠴ0Ъ;߄K¡ÀƘ^0ebyB¨uS\nAe栍О%±҉H*đ鞔d¡¤¨6Ҵ(À÷֜"&e ¥0ƾLiY8h)Qx* fyR<Ȝn¤>PBI!¼:¡В²Q%k񖺜"´Cª Dד¤遡̡¹/5dϨ!@'0¨y񮒢aZš¯\"ö꠮«)¥<¨Ӵp_Mpꖜ"Á¤ި° ¤DªԪ ᜢ¢\0)As)*\n~;D3¹!V²ZK邆öµ¼7¢ú%ңy¤¼ý±1m	Б	U|°«\0?'zf.3fv§¸X楮ϣ(^ݨҨ\r͕')1biqԓºZ񗐔ۘluz¶¦^¸v5fd8x¨C3e#G丛^2\$*@AÕzþʬ	7Nޜnþ&LεÀǛ;ї©¿&圣⦮N)	礄ÁԭՍ植ԡnĕɆH±.qH:ŉ¯;¦uaړ¬2CS0fY֣D¢Ę¦e{\0³l,¤ĐLx˨ϙO딲ö\nu¾¯א8ʺ5õퟫ�ͺ¨P¾ū/BǱ͘±魽#ɭc⃤dO6¯켩ź·��&oasmU*a¥\0";break;case"lt":$g="T4ΆHü%̂(e8NǓY¼@ė̦á¤@f\r⠑4«9M¦aԧŌ!¦^-	Nd)!Ba¦S9ꬴ:͆ 0cA¨خ8©Ui0磉ҮP!̄¼@l2³Kg\$)L=&:\nb+ uÍül·F0j´²o:\r#(ݖ8Yƛ˯:E§݌@t4M´擕I®̧S9¾ÿ°P춛h񤥧b&Nqсʵ|JPV㵵⯢꼞<k49`¢\$ܧ,#H(,1XI۳&𔕷򧳰ʲ9X䄃	Ә 2¯k>˶ȣF8,c @c#ֺ½®Ìͮ.X@º0Xض#£rꙧ#z¥ꜢᩪZH*©CüÈ䐴#R쓍(ʩh\"¼°<¯㽜r·㢉 ¡¢ 첍C+ü³¦ϜnεɈh2㬤²)ht¤2¦˺ͅ¬HԺ»钤¤˃p󓁋ʶ5´+\"\\F±»l¥-B8?Ʃ|7¦¨h¡43[¾¿\nB;%ӄˇ,ɚ	©i{0«PJ2K² 5J襓RTâ셏,øˁA bx¹£*¸¯옦:Sª4¯ϨT񤈔S@P:<sÊ\"tP1¤ڋ풠U4¸񼆡¼®uߙ§5\$Ipy.ׅ균	}_0߷½ƁKۓd@t&¡Ц)Bس\"蚶¡hȲZք®⌓㪈³X¸D¡ƻ-\rk*fMþp2ܔùúH)¹lZ#KĘ̑޳âβ诼4䳔س¯⠞%sA6X㘆ώc0궭㺍8伄BϜr¾µPڳ«P9) bi{û­;񃪷)(b2£|課o^3fit̐#&ö¡[Ǡ¥##@УÁ脴 ็Ax^;÷pÏjc\\±Ả½«B; ᐽ⿳0x!ö«5rA[©)IRU¬«bSo]|D,ʃ³f5\$i-%Ӂt û|½[݋%ֵ݇eڶ݀㠷በ¼6xϚ\0ny\$蟄ڜq=賔¼jA§l򠠠}ۉqMF£²\"½ØySFdġ!S͗*CǾ¡܎6Àĥ`ørsɯ*@¿l­¶¦؈x  ӃbR𠌧ӞBX9maAқ˜\b2ɐ!.ʢ߅	u\0��씓§A(P博,f̩zAh\$£.a\"ãܱ\"-¼EWț}[赇%H͈c\r\0½w`©L©¨2¡ه6¨e;ﬡ0¤ њ- 㱋��\"Kي]esAΙ\$\nƸ¯BVJѭ%倴EXj;E²µ\$vv6|s²͓ I!a䈂j©\$y.*Ԛ£C©AAü׹\0]<²>¡Khªj\$Aӗ³hO\naR2 ܣA\0S¤®s'DÀ5꜏Jߟ󘓑Pܙ+ aF½WÁä*CD臏٨}M\"wmՒZRBa3TͰ#ćT©#t7B譂M\\#J㦮E¶%Àöȉ(õЀWeBقǜrk\".¨9^ɺªSõý})��ԮᦆضbU%1ހ-؜n蠩a­Ve	R±D̝ɽ«r° ¨'B¨TÀ´3GFMNù\$²5¼鑢8SyӨĸ\\b:¾®Ƿ4䜤HáK¬ þ­\\{Ė֚𕋅񬜲I¸Ӛ䐓¨y+E¸³Hqc-�S_M徠%p6̅|ʾʴ͹,ROȤ (&ú¦䤹¥,8VzõԋUA\r¥Y¶lyƏM¬ÿ.+£_Uؾ͝¶aɺ<ĉƞʊ+*⁙µ(V!)ŝނ懄¼¶񮚝dϲd_Ĵ8°";break;case"ms":$g="A7\"洴ÁBQp̌ 9§S	Ѐn0Mb4dؠ3d&Áp(§=G#iֳ4N¦с䂮30r5̈́°¨	Nd))WFΧSQԉ%̨5\rǃQ¬޳7΁Pca¤T4Ѡfª\$RH\n*¨񨱔ׁ7[褩9ɠJºXe6¦鱤@k2⡆ө܃Bɝ/عƂk4²׃%؁©4Ɋs.g¡@у	´œoF6ӳB襹NyCJ|y㠊#h(GuHù>©Tܫ7λ¾Ȟr\"¦ь˺7Nqs|[8z,c<⌤h¨ꞷ΂¥)©Z¦ªÁ\"胭BR|Ġퟻ�P7·Ϻް°㚐ݥ¼Ԇp¤Ꜯ 㬘簠P¿A£BJ\"§c¤\\'7¨ᓅÀ%¾a6\"7§.JüLs*ú³\n؅	.zhÎ¨XȂ.xΣ򽁉°%A bBr'qª0¥²Ц鲠P¢Hɺܨ\r+k\"³{圢ңԲsCz8\r#oM&㤡;ʏ¹𺴴¬`¾ʜrdµ	@t&¡Ц)Bسi\"�£ ȅTtùB#ú\rº=õʰ1\\ªK÷tܣ(𧍉҄¤ɴ`Cd?# (읧#x̳-£pʒ؂LS#/]¢ިK𚴪#r¸䱸Lûv6bS27')\nF\"\n/R򄋨­쫈©3¸ژ,Ӊ̑\n讉²J*:	 ¦\nC1c lⱬ¥ʐ2gxP喣̞7´sDй£0z\r 踎aОû¨\\¢k.\\÷ẼJ*4­!xDjC# x6Oӭ^¨򰪉ba䓓62Қ˕¶e ·c­lɘr0spA²>ӵ�㹮£¾וּ;ֹ¿\r۵柞ިD¥Ϛ0Àq¼x@1߷p@дzϖ#c\0궃z̜(O²aS~!3£¸±¡H@;Ԩú{􌏻8Èf9ለPƘϐsÁԏ¹ӒýÈt)Hû¡8��lEĶ/ܜ¡¿|؞"BnH\n՞\0PRJ¿-¤·n³:𕋛³0A,'¼:@ᱻ'¤ý÷÷⚜"!C\"󷅜"³  Hc)쳶ֆӌ'I÷ď\0C\naH#\$ ҔM⎄ͅ¬Đ͊7(ЌǣG)՘eK\0ˬüKF¾=²謎\nt9`¢4@ɹ湭G孁󙖅ح󎈚»yn\$:§.힪U7fÀø¥РTu¯¥��0K¡P鏚!Þ­ªõ˘ȡ#h*öBdB'\$õÀEK3L°F\n­H=ӁJ噈T⤝j¾'d؛AɤW栤UA碄퓄Ըkӕ	r°\rUE𐐸la¶6;\rQF2ϠƲ@̮3obhͩfFT*`Z	-0ȒüꜲ\n`#Xk¡±=Mꪆu:&\$(z	Ĺɚ5«gRp޻b{5NrS3¤Jc(zI,¾­@o(¤3«J|¬ɴ`bӉ̝\"f²`:1ù\\T²\"҃°TImKМrPNE(Գ_ț5&]뫎ù\"%努³TÀ";break;case"nl":$g="W2N¨т¦³)Ⱦ\nfa̔O7M泩°Ҫ5FSЂn2X!Àد0¦ᰨa<M§Sl¨ޥ2³tI&̧#y¼髐Nb)̅5!Q䲓q¦;哹¬Ԡ1ƃQ°ܰ9 &pQ¼䩳MГ`(¢ɤf˔ЕY;Í`¢¤þÀ߰¹ªȜn,ঃ	ژn7s±¦圩4'S,:*R£	嵧t)<_u¼¢̄㔈冄¡�ç5Ɠ¸þ2㣜võt+CN񾶄©ϾߌG#©§U7􇾉ʘr({S	Θ2'ꛀm`໠cú9밈½Ocܐ.N፣c¶(𢎪𦝪°­%\n2J砣2D̢²O[چJPʙːҡhl8:#Hɜ$̣\"ý亀¼:��p@,	,' NK¿㪄»¨¸ܠ¯3; Ϝrш4µCk	G¬0 P®0c@醁ÀP7Mێ\rH£7LC`ȅ	ʰ껪)\\ú¥#򕁴⅏ȣ̎ЁA jXBҾ宮 ¾pBȫ23#鑁B]\"£l¨¾ͪ0㹣¤5(TS¹!KQ¶Mᡣ҄&\nSnٍ2¦✜VҪ7 P\$Bh\nb2HږcV5¬³8¢¨苡Wn`©6«J.Ҿ\"*¸£Ñ\0ұF\"b>²#`黳(+¨\r㰌/i¨¦¸Pª4K̦Pܼ 걌i 泎£`A6/C£胈Ϫ(«Ҩ«ЪR湊6튩#x3Á죸øªc6*:ĳ8@ ʶ9:#@4¸Á\0x덑p̞T蝇Ax^;񁲣»!¡r쳅队\0:֚ėA÷0¡»᠞0ۅ0ÿq\nXٸ|ú<쥃º2Ҫ5쬺o8𗓆¸°谸J±؝¿p	ñW;񛪵Ȳ|¨݊òֿ턊¨|\$©p˱\rçEҢsb7¥-Vz0¡˄牘陨іzOʣePϜ$\"G̰T ½ퟃ�!F~ቷ\$ĊCf%g´FҚSL(§ؒ¨ӡ,h¹r,5nKù£¯y2ÒP \n (<f<IR=Á眰PUZø\ne½¬#¾O¤4ƀ p䝜n³@p0󒚠R»*%L뇴ѝԦua¸85³Dޡ)所³Ұ  ±A¸Spx) O[˚䔺SAȜ'ṇ÷l¥¡6'駨��$h¸÷?°@µÁM蔚(Lђo-䒬M.!ԣ\0̓	봲=PƋϴ&6h(P T¦¸F2TK\nYM˜\5&¬%K´#¤Y̓®˗\0r\$l鱂¦ރr=򹐇㱬C5¼À Q	ú)0ҵ°T¥l¨¾Tý¥úaa!ȢJյ:Oj8ͤ\$ѵGûPʩ¤ޏہ5TL᳀H뻜\ʥ󆊞i	5l6¹º䲝8Aޜ"¡ʜ$LT׹(˄j\nNɬjÁT*`Z{zM)+౜b¾ErqAu32µ\r!*ř\"±+HQü>HL©Gø¹0Ĝ\sk𜲡<¬_%\nDvzbFº7­,½Ec̐\"bö¤ʈu#᩵`LÁv?笅ZrbwÀPPjIL¸¢ƈ².I¦U¢䜮ɑa«ľµ󜢌멫Ra}C@PEx꪿¨jˆ̊²!g\no¸aµ# ()\\cRQS³(";break;case"no":$g="E9Q̒k5NC𐔜\33AAD³©¸ܥAᜢa洌·Ҭ¦\\ڵ6x钁%ǘkȊl9ơB)̅)#I̦ၖZi¨q£,¤@\nFC1 Ԭ7AGCy´o9L擱؜n\$��ſ6B¥%#)՜n̳h̚Ჺ&KШ6nWúmj4`鱃e>¹䶁\rKM7'Ъ\\^뷶^MҒaϾmv򓾌䴠ᴂ	õú縝jͻމӋLԷ;i񋃹`N-1¬B9{œq¬ܯ;ӡG+D¤a:]£у!¼ˢ󳎧Y£8#ØH¬֍R>O֔윶Lbͨ¥)2,û¥\"萸ȠÀ	ɀڀ=렀妃Hȯ­L܉̘軡Nퟻ�¬҅\n£8򶯋69k[B¶˃\"9C{f/2¶񳄅-£°܅\n܊.|Ѕ2(¸ܧJ'.#`򐁡,ú1O︔5 R.4A l @,\nv²Ў¬ʀ:0/󜰩lSʲBC\$2A+z>̐*\r)²W¯«ȏ0°MLø¦ְZԎu>¶J@٣%E4Ո	¢ht)`Pȗ¦\"ۍs­0»`V(ᄈ켃1¥ި{^£(𐜲ȴµ\r7*¦HF2©ؖ	ز܋#z0¹C0͖ª¬\n :¤ںԂ ޷򊿣ƻc0궣Zعü򛌫c\n¢O£jْ¡@攥\"¨麊M쀘(CC\$·Á\0ꃉɡ\"㖲1౲!\0ПÁ脴&À杅ḯ»̞À½-8^¥漢ˁxDpOÀ㈼dÀ֧dbv89ÁhAЈυ鎸@88ctÿk¥j嚍C 򼽚mVٷn¦庮ۆ��ýÀ_؆7pʨ|\$£󗎨WǂzȆk7ܪ¸c8ԝµlcÿ82J]¯Ȳajt\\Wً;GMX璎£\$ûҔº£3|\"ɢ#¬9=´^CfZd:²栌¢ugМ0:dþØaE1W̚Ks.%̦2@왐¹E	½֯ÀP	@¨P²Ȁ(( ¤¦÷Yss̴!¥¢.ÿS2el4µ_]þ4E@\"lOA}EH&ҜЃ/g𔌖Àɝ@n¸pКChA¸@(.Faklu\$¤´oBS\nA򒓜҅O¥°¦?0ԙL#1-²Kɉ>&Ē𨙊`odΏ96RܲR褔\"X±Fє7¢`¬T'Áĺsa1kͮҁA񑜰2iù¤½膷°H(k򅙥ض@f񚦰73𐥛매ýeº3QAhkKD3S~'Ύ&µ3AY#x\"H]&\naD&Ҍ͡;iÁP(#3z^j¢|%ҠEö>Tؒ1eС3°H½\"õ9ً_tø阊Tz~暓\"³V}:(o➓򒐑la­ܩˣ /ͤዺ6ʉ²}Ɲø#¸ʈ¨TÀᆆPιC|§	􅺲3FMý0¨5´¡:ഖ¸K ERS«0|M²AԛÁ!̢\\'乬¶qKùּ◛\"M֣lҕ\n}\ri®ªA¤¥JʊᑦՕ̂1҉ü㶛(Xõ¶¹ҳ¬pgT-(&pKU©¿.ݑʻTFM|纁P»¹o¬&H¨2";break;case"pl":$g="C=D£)̨eb¦ć)ܒe7ÁBQp̌ 9泑ݏ\r&³¨Ĺb ∹گb¯\$Gs(¸M0Χiخ0!Ɠa®`b!䲹)Җ%9¦ŉ®Y 4Á¥°I°0cA¨خ8X1b2£i¦<\n!Gjǃ\rÀٶ\"'C©¨D78k̤@r2юFF̯6ƕ§鞚ł³.ƪ4 歕öi'\n͊鶷v;=¨SF7&㮔A¥<阉ސ粔豚ʄpܳk'¼z\n*κ\0Q+5Ə&(yȵේ͆ü÷䲷¦ă\rퟓ�c+D7 ©`޺#ؠüÁ\09©¿{<eತ m(ܲ隤üNxʷ! t*\nªí򴇫P¨ȠϢܪ#°j3< P:±;=C컺 µ#õ\0/J9I¢¤B8ʷɣ 仈Ȼ80¡Ü"S4H􄶜r񋺏,§Oc ¾ûҜ$@[w84¹nhº¹k㙜0cU'> Ɍȓ1c ӯøԡSõ\r:ʎҸ��HÁ iX P¦=£[㠴¨â􊰣\n	J꺁Hù¡2䗝& P§£H٣,P±º{f6IIBʓ󠫥ڄÝR)��6М\޷疞ׅ´߃ͤA^\$I²½‐	¢ht)`T&6 P 7څ䛦ʺ6@J@ü¸ꜰŖE^9f®8ퟌ�8ߞ¦֊ݜrʂ 莞3ɔ>\nq:i<ݔ%ٴPʖ¬Sr1X䊌Aú;ÈX3#¾r)ያ:9wް2kJ¸ˮ£Ύö{.Ϲ®ۘ炌[~>¤¥@në½(;⣭¡ü¿Á켮͸퓧ƱۊZ¹¨<*:&گI9¥pX۶§軷_¹i\"	۵ķĀBɻDûS7N꣱\r𱲐ЈÁ脴 ็Ax^;üu»俏Ȏ`^Ѩ ӟᐼѯQ2㈼Ԉ(j(!ܼuZSjʽD=6उ©\$Ũ 9A䥔!􂐠,ϑ뽇´÷󠼏˾t¬Ás꽏¸2³² σsõ*\0ø٬§ڋ\rO񿔥會r粁§D.TY}G䙴(A	aA¦®» ̼10p끈ā5!ܐ\0	°T\r07䏊ڜrÀ䙏ʉSa30��a:ǵ£ȴl2I5»À榋ӋD¡铊D肆(»[¨|¹ʜ$L\rm蠗f]谄,%Δ P蜜¹𵒚��@·脂\r֓'bQ/屠4r𹇅Pၡ̰5:YvA#-4o47§£F@- 钯qªsൠԞLB\r¥°9@ҙޤ|R`0Ȝ"1\r)¨@CTɈ aL)hF݁¬0¡ɜ0l'º^:§tȑ@k?	IǹBrNɩ?D)\$.©h;Ӟ͉°J!𗌨W\\iF¬&&~@ƽ))ӤMaNe爷¡IIIøz\$󁾌Ám+u7%\$&JrѩU¹°ÀꙞl\r'Fغ!AÀԜ:ІCU©jÁ\"b͈S\n!1ʓ\nQù¤¥*0 䔥䡮 #@ إ\"Jpù:Rǜ0PR2(H¹½øJPÁ⣪4<kt¦-원N°5B|CԦ¸֬ɲ룲ɦՄúj䔺oVﯻÁu㻯γ)»¤Ձ6i6°֕Hý\"¥u担N@⑈)Ǵ¤`bm´}*¤¨rLʑl/9 (B F ۞{u�¶aµ͛¤©L}論ú	*°¾q%µNl!)¿1j\"Ƙ¸ޙPMdbˀćP引§øכ\ny)ȥ!7ےH \nÀK*§³XӉ!ǴƢz_󯰐㸺gwW§b'.DʸF³¸ګ\0¡=G²R#Á¥-ؔɢޠ´u蕆�[¢ʌދ0ÁcÀqݽG=\\眢i¡	³&Ȫ±®Ջ\"V¢£��&©";break;case"pt":$g="T2Dʲ:OFø(J.0Q9£7jÀ޳9°էc)°@e7&2f4͆SIȞ.&Ӊ¸љ6°ԧI¶2d̦sX̬@%9§jTҬ 7E㦚!Γ8̨5\rǃQ؂z4ÁF󑤎i7MZԞ»	&))縦̆X\n\$py­򱾴נ\"΋&󨀐aV#'¬¨ٞ2ćHɔर¶fΏ¯β́ȕ¢K\$𓹸鸡ˠ\\[\rOZ㴸¼»Ǝ뭒&À¢¢𧅑M[Ƽ7ρES<ªn5糴䛎IÀܰl0ʐ)\rT:\"m²<#¬0滮\"p(.\0̔C#«&©䐃/ȋ\$a°R ©ªª`@5(LôcȚ)Ȓ6Qº`7\r*Cd8\$­«õ¡jCCjP姣r!/\n깜nN ʣ¯ʱ%ln籉«/«À졽m°\"±m¤1A8룍2J貥\r;ҧJΰ®딂2i��r㲳.³�2򄁡-1M!( 򘁏Д¡xHՁ(&Ø낁C6Vȸ@6\r첶'S;&=H ͈Ŝ0׌k򣈡jx4¯b\$¾ ¤«¹#r¹(©JV㓉=¦%	TlӴ0ڍҕȉÀ³®Ȑ\$Bh\nb2xڶ☃\"햲ٮk܈R2߀ꂜ\¥ك8ҹvsX󌅜rѴ©d7óׯ'IIʎ6½©k&; ޠ'£̀Ɏ£êM^.쐘َZU︿«Lhtö2S¶).[lo§iºrӿ\r͎䣰ΐ#&껋% ׁ∴3£0z\r 踎aОüȝpp\n賅逞¤/.{A÷Hܼ᠞0ۆ˫k·갼5c\$µTíA\nX+÷l΂Áӱ¼#ɲ¼¿2;󼒰ܿB7t#Ɖgu\n|\$£_'9ݷap蟓\r§Ⰽp8ӆHjzJ¡8[M´¢ɡ6&露܉¡3 aӟЮµ	1#¤½¶Ө@óŎm5º5¦ڨ  s꓈+̀¬62r,eÂ1dd¡µ  Q	7ɱCȌlH\n5(AP\$¯#Ȳ@\$±ս9³5fµj1M½?H0½+Àđ 神(À؈0 kύýࠞ޲B°¨ޓ'❜@񰂆<co'��¤£ѩN	º.µ©¢ퟥ�0\0((4Ѕ9A(e! súHüm¯Bbר Cµ\r©#¤eS'\$H\n¹úägUɞCD؁8;O裗}ùخ嘐	ጪ\"4¦ɣ%]`3¥i©\$]ԅ㼏	񙙲9ö¨MSi-ɤ憢`՚k:杕²ùc鶗؁©숂Q	j2Ԉ0TdõLX`f9D¡~ĔöN)ɠ~&)4꿎õ:\r쨮J¹_ٛ!1®°\\»i<Uz x`+A¥\\Ң¨b3³ø·+ұ'N¡«ĘkߊAi¯P¨h8\$Ṹ¶üN)R¤fH»,MI4¦\\לr鎇-ÀE³X 'F6#bðy`l@·2sú]´©±BjQƜn©𽳵v^]C·:·^a,'07тŹe6Þ Pª9b閔T¸lZ9¤שk#bꅊ©DQ,*򼙧¤<Dӝe`b¯6*ً֩.Kɲ´f`;KR,Y¡͜\¢\$ݦ鸢;break;case"pt-br":$g="V7ت¡Њm̧(1肿	Eó0朮'0Ԧ񃜲R 8Χ6´쥶¦㱤²G%瓩¤쯗iܨXjÁ¤ۜ2LSI´pዶNLv>%9§\$\\֮ 7F£Z)Μr9̨5\rǃQ؂z4ÁF󑤎i7Mªˆ&)A繜"*R𑜤ܳNXHޘӦF[ý圢M瑁 ç°S¯²Ӧʳǎ§!\r4g฽¬䧂»fø掌ªo7T͇Y|«%7RA\\¾iA̟f³¦·¯ÀÁDIA\$䍳БT甪f㹜ܕM8䜈󖇻ʋn؎³v¡9레35𐪌ªz7­2晫«\nں¦Rϴ3ʴ¢⠒· ʳ0\n¢D%\rЦ:¨k괌Cj=p3 C!0J򅜮C,|㫦÷/²³╪r\0ưe;\nÀʘت,®¾>²<´½\ni[\\®ª͉zþÿ©㒺7M*07«򫊲¯A(ȐCʌҔŴہC̀þA jPBN1´0I¢\r	㔼ÀЊ2¥G3jĭ½£󠐁jz4°o` ¤c«¢½4`񨐩k)N 㜲¡\r㊔%ʈ]NR÷\r ܌ˢysۊK#=䅉@t&¡Ц)C ȗ£h^-8h®ٜr­躭�³¬&)W䵎D阧eޢc>Ŝ"㣊5Mb^㰍9ю2©.Učz1.:hRF3©MsCab\n9h·̈́ÿ°\r.¨ºh0P9.4ؖ·´Ã#¡LzsõxCٸܳɮ!zƨd񲠞-kF3¡к杅ḯǅÎarø3阞¤°* A÷8߽!ްْF¬5Ɍ:!\ré:¡l@þ.ҳ¢2§\"k&'\n׌7\\тᇁÁGü/ı|o;򼝙򼈝̏FOτJÀ|\$£kߎ7Q·p蠒㦆5»ʔE'Ӄnˡ¿p&aբ´zM·=洅­&ºШ;Á1¹㾝ց)1�¤¼fx9¤p據rk0aù¼}ұ	y ŮFL訆lˬ²0D¦񜢤@PAȀń0PVI*,Ȍɇ2BXI1('!計*zMɠ6k@۩xnüA¦	\\t¼۠£;梁¼bwϻ󿡸8T񉛈Rᜠ0Ј\ngp횗ށ:\r0¦4xN\"9® @·Iq㜜)¦§³b9\n'P规}\"\nEDr½5¾¢JS^ƙ´¤#ɰCܘH÷؆׸I\"¡䕢B¨±+~§ܚ5lY٧!\rټ��¹D̡<`Ϝ$BO\naQ%\$|OY;#*褎¤85P	2DJ6L㆔˲\$;ͬ7\$\0άSbn3¨µLԖ͚¹rT1LCq-¤J'ʜ\£DþC4ښ!ȓ 5y>\r#+4둳#㫓IŷRT莯̯¢s!Ѐ'Ӆ&iإF!:°ȅR'ºy.º®ø¥󫵁{3ʛ\\ᜲ*؋ퟕ�ᶗ/¸¼dÁj¹'!Ծ`ۙ\n¡P#а¹ۙnuYK:QW)ߖĲ®®ÅNM2C«ΖÀ圲̩\$ERf˺®Àؕho2A<°Pʘ͘s!Ný.ՍUw=甩Ԧh®\0k:Ǝº%YlJj:°("øNT-(񈞘 vlQꜮ\rC¥a.qF/Iu#²餳ߍ?R¶6̩K-cª!O¬H@Պ̈¡⦙GсL؂C鬘1d`Mŭ1¨䅘ۻcȸEjّ§啀";break;case"ro":$g="S:VBlҠ9L瓐¡ÁBQp̍¢	´@p:\$\"¸ܣf҈LL§#©²>eLΓ1p(/̦¢i𩏘LӉ̀-	Ndù鄆e9%´	Ȁnhõ|��FC1 Ԭ7AFsy°o9B&㜲ن7F԰ɸ2`uøَZ:LFSazE2`xHx(n9̌¹ĜgIf;̌ӽ,㦃ގƜ©° :n§N,訦𲙙鎻;҂¹ƎꞠA̦ø쫗2沧-K£렻!{й:<홸Μnd& g-𨘤0`Pތ Pª7\rcp޻°)伧¢#Ɍ-@2\r�­1À༫C*9뀈˨ބ ¨:ïa6¡򲡂ā´J©E\nℛ,Jh諰㐂¿#Jh¼©9#÷JA(0񐨞\r,+¼´ѡ9P\"õ 򸚐.҈oq¸) ۊ#£xڲlʊ1	0LK0£q6%Ö3¼̎A²Aʲõœbnº,򄹳¢`޳ƩÀ٨£pʁ3«û@֫©Ĕﴡ(Ȑ\r򵜰זCʰA@PHÁ gh P¤5j,;¥[Oú:@CZÀ¢	a:\"ޘMw])CJ\"'(VtꟈO\"8ȦT°¼ܰ(Ŭ䘪+x\"\n63a®b/pؖ¡x*£h\$	К&B¦8ڶ󛏜"륹=舦¹i¥`+՞¨©Ԗ֨K¸9§¯ú³أum3âö˧cw4	(\"b򁂠ޜV#̤Ў£®9c26UoYmÜrYƸ¼RªšeKO¹+	訚A\nv0¯¨K쐈*^¾9onܺëÁ☴<0z\r 踎aОý¨\\¥)䗯8_Yퟋ�»xDxLRö3xrJDܡ(|GCÀ᧱[ܞ3¡¸쫴C,¬0񬋃]§¢l*ý£񜊹W뗶򄡇Lu/T띳°vNћ;>¿\rμ<#ƝÁRÁ%7Tþ@kϩ@ޯΉ휲d͓p䬗鍫¥룕Cu&Oõ圜^qlL%W`C¹¼&Ǝ9tþ¯Èf~9ȷF썛ÀgF1㜜0ЎJOᾆúԜr2:jof(¤¡黲F𫃐Ɓ̓LG±`ᮅ.ARp똮+\$¬򎁸螆S|¯иr8䡲8Àw<.J+°#K\"*xH!~HsÁD!N´Á<㔡¡'¡)  azH¬4&&)醂tIIC(¥%Ҋ­ͪ\\)¨~ˤrKÁY`gÀܚè ͠.M\r*þG݈AN<ĺ©\"Zȳw\$Ϋ+7ސ±ǹ(߾ҰCQC\n<)HĢ䙣=§nF@܋#ᕖ«\$.ÁYLťĨ贿³¢%ĭ*\"ЊẢ䏤ퟆ±,	ï)싧ÀL+h浂\0¢V4ø'-\0¥ly\"YJ\nl1ਃs,µXÀUVᫌS=ªǕ䵧U¡¡ՙ´|	¬l.l ۇÉ.%qݢ̳W4L³b즿H,)ªWºY¨؜nÛ^a¬¬\0@诫J½Sµ=cl\nõ作ײV¢\"1\n¡P#а=>ĵb)¯圊1LRޛöCS\$I d􍑂=(I¡2¯·Բv	¶\0003`V\reƪm<)Z@Q᳋h+ZGhY.(rՇwG(Jc(pĠ\0ٌ\0v¢Á񄮚¢WõýUJªS˟mù:¢j+j+G=asMH¿°֌򬌅d¦蝗LE¬ޕш¯iꛜ"胑ާ݅ڌ¬@®ރ1\$";break;case"ru":$g="Љ4Qb\r ²h-Z(KA{¢ᙘ@s4°\$hИ4m󅂑FyAgʚ\nQBKW2)RöA@¡pz\0]NKWRiAy-]ʡЦ扌­谤CE#©¢굹l²\n@N'R)û\0	Nd*;AEJK¤©ǜ$Ж&'AA氤@\nFC1 Ԭ7c+ü&\"IIзü>Ĺ¤¥K,q¡ϴ͔.Ĉu9¢꠆요¼LҘ¾¢,&²NsDMޞe!_̩Z­Շ*r;i¬«9Xగdû÷'ˌ6ky«}÷Vͬ\nꐤ¢ػN3\0\$¤,°:)ºf󨮂>䜤e´\n«mzû¸ˋÆ!0<=Á쓼¡lP*􅄁i󤦖°;P1 W¥j¡t欅ºk薡S<9DzT\nkX]\$ª¾¬§𔈙¶«j󴐔y>û¬칎:D.¤삊´1ܧ\r=ɔ>Ϋh²<F«Ư¢¬¹.¥\"֝£¦-1°d\nþ哖¿ݬʮú3¡:M䢤÷¤ژN�ú2JU­̼ퟎ�¢G֪#뜮ǎT񓘦䬴󵠣HkΖŵJÀ䌪m})T늣U%cĻÀú7\$۱Nˀ\$@#\$_̓­ɏW(mԌõlݱµ/ĸε±\\¥ÀY(¥\\³ɷ5ø뜭Zt9D¾¿Y.Bh5C÷إƁA jpˋB᣸¤އeɸZ,��	7<2A Mې-Xa֎Ȳ<|V¤AuúhԈjúú)hc¸쪪ûdªRʻ7yꋚ⎙ Hª})¾ö¼YW۫V죕R_ÀO¯pŨc¬%,򜜢Ńqܖø!³;jr؏6+Č֥8th)\$緜0(ʾZʷd-¯E.șf¼戃H氌C`ʸa\0޹(ݪzއµ谺{ØҷÛÿШ5\06ۗP¾o帨Г4¼ԲqQ¼Pǜr£4¶^:b&&Á²¸NB¥>砝?􊬛m/+\\䜤d𞊡$b£ø-ܴ>=Ka嚡üiah@蔲 6jµb¦ú©Ȕ8py	%TÁ`ʑyНt1XTxaaE!°ÁДøfa	°%XxS¡񹈇DH,UDe񬅀½bHMИªɼĮ¼h¿\rK«\\#©̡%Tû dű.÷\rђlÖϟڶ`ú&0hi\rÁ9ň`ʋZGDאYʖ=ǸÀ@r¡ Н p`藂𯳁paªV継Á{ޅᑶ躃p/@úH)6°JWగ|§Tù*#�\"ոv偍	ú^񵫊E3À)ࢲUµR꒔*衠µp®õý?A^8m_L	1&4șS2gM	¥*eXrÁʬM ʹߌ܅ʲ/2 SS¼}]²w@㘩Įl)#2<ˢ灇r5ÁIDy`4ΉeO龐ҔREՄ¥AҁQ҈°Uq=ʸ«±´멧��©΁J)bvJ䏩ªj;\n%qܗ ԊT§ީũ䋛¹bŔꞔIԺªĪՙxA̏>i쒆ªVnS©uȉ 𢒨6\n\$PP\\Iu\$~°ǋQ݃±覭<򐪦ªEQ£ԡ\0~£Bb±񆻀²ɸ4&¦hsdӇ5ɹ¡öÀªs.N­jyn\"ĩ²쇙CCS̵@¬©U2¬RÀ¶%%刘kª=ڪrIHe%HÀ¯(BWY	>*A¸HJYA>­mB¥ºKd·\n¸_+ȢbŞ£67ķ<.a£(¤�a¥1v¥L't��ԉD*ב¿§鉩鄬 M¸Ѓ견\$¼D§hCP蒶£4\r¦¬{m@(𦕨¡²&Ҽ «¢«ƾLEC<ܢ¨ՍϘԦ®ңw`V>OTU­lZ`aȡ䧜rKP!nù¼¨²+sؑ\$\n͠r䮩H ֯욘Q	½Ry\0F\nA]v/zt÷\$䟜nAø!¬Q.K]'%1¹䡵¶ÖEºįΗ;򼬖zԒ+s®µ,MRr´¸FûB彲+«	/AWM¿w?㻺qÁQ³e{ùZ_W[꒦¡\rúÀV4MüX°q¤D»Ĳýʅ圜L#ªeu	Á\r󄐸Qª>閅&Cª苾\r\n3꘤B00 \n¡SⱶUϩ򏖃ĞRĠr˫d¯t9Ѭ{dݞ8q׮w_jö:2§ﵵKű¿ 邥*.±齼o~֥o£A}o©ԏ¢¨³§¶s.ҪWੌ¯^ըڗ睫'a⥊yujxڹƒh,((%ª\0@0_,þ!w¸		/¹䘖w¢D{¹e¥\L=喇Z_°Ҁfퟬ�ªÿɐ1¶흹\\g鴶奙E*õ3²ř\0*1ն&»¤ꭺ̌¶CڄùꝻü¥)b 7lȕ¡\nm/\0¦ؔ/¾h°¸ºK^L¶DԼ¬d̅N%Ke¢d[­Ɗ圊Eԕʺ)©)©颚jR¥jZ ̠掠Ȧ`服j͏\"ʍ6^猹M@ª긝ࢻbreak;case"sk":$g="N0φPü%̂(¦Ý稡@n2\r惉Ȓl7Ō&¥¦Á¤ڃP\rѨјެ2¦±¾5βxdB\$r:\rFQ\0悔â18¹˭9´¹H0cA¨خ8)艘DͦsLꢜnb¯M&}0衱g泌¤«k02pQZ@şbԷղ0 _0ɾhē\rқY§83Nb¤갎/ƃN®þba±ùaWwM\r湫o;I³ÁCv͜0­񿡀·􆜢<¬b¨Xjض&꧅¦0켚񧓔zn5莦ၔ乜"iH0¶㈦¦{T㢘ףC8@ØH¡\0oڞ>󤥌«z=\nܱ¹Hʵ©£¢£*»j­+P¤2¤2ºƤ¶Iø浘eKX<Ȕb涌 P+Pú,　Pº¦੅̠2㨊:3 Pʃ¢u%4£D¨9¹Ǘ9¥ҹ£ Җ@P ψElÀP՜$2=;&9ʢ 䤍HA:ӥ7Eӳ£Mؗ*£ @1  Vյ󙕕ԖÀP򕁍ÁpHXÁ洧룔\rc\$^7§髤-A¨􊉁Bb]AB׽ʢ´)Y⨚õ£П҃,㆒Q,ԺRO@4I׺*1n#wøªm\\2ݣ\n>8شׄ©9Ꮾ°¸nಞa®3]\0씶I(õG	К&B¦C#h\\-¿︺ùB2K¨ڰ	ģ\"Β¦)ڦ«¶Cu,7ꉍ°=&cl6MS:¤£ª`޳ؚ0¨¿ɭwҕ¸*\r鋖7!\0뫎£~9c0궄	髅`弌#>þ.¸Țº­P9)Nᐔs▲C,쐎Ժ䍎©H¨п\rX̪´°ܳɉ£jÍ¤²H2Á脴 ็Ax^;úrùܿÁr&3鈟¦c Ӭᐽ8x!öـ{&O¾0񵅫Ӕü9䲊IYY?ʽ\n¡p䂃Àp\r!ɒ0Aø¯伷󞋓.¯U뽐ܶCÕj𼑔༒Chp'	¨7GκZZ÷\rlַ`ʢS繻躡ú°±ע^ոy(ԛꃁLOOy¬\0#¡aɗ\$ԫfe¨=¿§ܨop񙁆YHªj-(Z^â22쾙xOT\0''Z`뙢ФB)儲d\0¤\0­G怐Ck`1½秜r_Ѧ#ᔔª䜢\rYµA80S«?ФՑ`慑ø r!ҸPॠ#ʸ;FL䃻ȕ挦0¬C))M𩂰kÜnaH#@弸X#±PGürIKGj؜Y-%䅼:cݱ6'V7*ǃѐ§²ÿ\nq)	\$,<鐯¥'*ºbK(C©ªAÁ\0!÷lõ¤ħ1̐ x߬¡©CE°V±3bHIA@'0©\"-A pIÁ´*Ȧ[ЩIEA¹S=U¬:\$6󄛕ǰגøpUysL(ÀAUQ\"Á*q.󜮑Қ4¦ުc恕ª򮶃ɫ eٜrX2ET85p:𒞤¡0±ª¨0µ\"vM܎\$¥Z*¬dQ}\$;B 򝈅%!\r6ÀVؙù¨¤өњq«MO\$~Ô,2D¤#J°A̓G𪅀AÁýEdl󏖇^¼dl%Z¢ڗXb	Yyo8akץ̨Sxl˥׀PµˤrQ0E\0¤¿1\$H韴V©nউ֠¬򠕤À¥\$i8גSc܏\$٫²CS͘to\$h:tFF՚(ç븭\"h!%\\n_9MÀü%R4ѫ+ɒƉI򖆧(«1&Vʅ^5䙥*%A,3c,	¼ *Jõ³Hヨഐ(N¹ÀF\r*,°>8ذ¦²";break;case"sl":$g="S:Dib#L&㈼%̂(6঑¸¬7±WƓ¡¤@d0\r𓙔]0ƘI¨ \r&³y̩'ʌ²сª%9¥䊌²nn̓鉆^ #!Ъ6 ¨!��£F9¦<lIٯ*ÁLQZ¨v¾¤ǣøңM瑁 óৣN\0إ3Nb	P갔@sNn梋ˊf.ù«փ詆Pl5MBֺ67Q ­»fn_÷n3'£Q¡¾§©بªp]/Sq®з䙎G(ծSt0ƃ~k#?9缇)ùâ9萈`洍¡c<ý¼Mʨ鸞2\$𚒞Á÷%Jp@©*²^Á;��¸ֹ\r#øb,0J`躣¢øBܰH`& ©#£xڲ!\"銬;*1¥γ~2Ⱥ5ďP4Ō2R@搁P(ө¤ϐ*5£R<ɍ켨'\rퟨ�X臂b:!-C4M5\$´pACR蔼³@RЅ°\\øb麨Jø5¨Òx8ҋ:BdF ʠ(Γ¨õ/(Z6#JৌP´ۋ¤ܰ<³@ -¹gͨZ£-`®ͨ6!iº©\r[6݄«[ɭÀَl[V4׍ª\r½ɸ\\ɜ0엏I@ԅ	@t&¡Ц)Pڗo[֮׋«(¢[´«£/\r3hՠ5\n>B9dퟀ�8ߖµNڼ6¯d1Ld¨òt¨5Rhˣ;¶\$ʍ މXp򏥣¨Ǭc̺@¶尔§0hڝù ܺ !@攀¤¦£ᡔ(򞪱ϫ63d[ 4\nܵAC_P@&�3¡к杅ḯͅͶ̵ȐΗÁỨ\$¹x^ݺR臁xf)µ��\0\\@©쐷ÁVdú´iĠ¥⫢叶«\0Vȱ/]ߘƠ¼%ʲ܇5γܘ后]J2尾\\7uj@|\$£/%çc٥4щ³`	!=M5DС¼\\J܌&I	2J\r᜷Uh A1º֓Y.°97À䒐 aϰ5&¨՚ÚfҐE󜲈s),2õCId¼!Sz}\r\n\"ŉ¡��!\$«朤!tûȜn\0RGI2wÁ¼܆򞐙yP­üΐs,f?lҟp@Gɜ0wP\rޜrSffבþKѐ\"ܜA?nsH׋4(qCqK)D»%8JiȈaL)gv³κҴP6µ¹AᬖÀb`L (ҀP£%d¤c7<4¯Á0ݹ>DƧxûÁO²僲b^Hy1d4¡Bоzєꦉøf=qÀ¹öQ@c\$ȑǓüf[j\\.ĬɅ¬Cѷ\n<)Gvhj:󖞋 \"LW#䘰4v¤9Hʬ!¶q6Úֳ䀛GxÁ\0S\n!0e@7ÁR-´(ٿ3©%4䌟m/J	}¨e!Ю*&;rzʔéU	@(\"¾±ªF©?¿Br%گOõ2\0§WP}_\\Eͽֵº+9­3.蟐Ң��̅󘫽UIö3¤И\nÙ:\rfԜ¢Џ¢Àu7䬣ퟴ�­²څP¨h8dn½Ξ#̎öƘjB½B­©Ցq®󉫫ձ\$6ͪ®շmɪX¶ʿ/«lan\n#¤lٔw^g¡vM5	̞K!¶&0TF¦¤] ⯎h¬Y%\0xѹ\$ W\\**v̹ \$R®뚧)'¤À߉H̾4(ҿc qiXƘࣀ]­M`¹¨;kn¸!¥I\\p툰璩A՜0Y !À醴Kn(IT·v!{ܤ=ܲ	Ψ®ûį°8\0";break;case"sr":$g="Њ4�4P-Ak	@Áڋ6\r¢h/`㰐\\33`¦h¦¡Ѕ¤¢¾C©\\fьJⰦþe_¤ل奎h¦҆ù ·hQ扙jQ͐񪵱a1CV³9Ԧ%9¨P	u6ccU㐹�/A肀PÀb2£a¸೜$_ŠTù²úI0.\"u̚-ᰕAcYXZ絅喏\$Q´4«Yiq̂c9m:¡M瑁 ¶2\rƱÀ䩻MS9栺q§!遺\r<󡄅˵ɫ踭b¾x>DqM«÷|];ٴRTRג=q0ø!/kV֠肎ک\nSü)·㈜3¤<ŗӚچ¨2E҈2	»藊£p֡㰀2C޹(B#¬2\r7¦8Frᜎc¼f2-d⚓²E√D°̎·¡+1 ³¥ꈧ\"¬&,뮲 kBր«낅4 ;XM 򠺦	ɰµIu2Q܈§sֲ>諥;+\ry H±Sʉ6!,¥ª,Rƕ¶ƌ#Lq NSFl\$d§@䔰¼\ne3ԳjڱµtӴ6*Ъ҈_>\rR)Jt@.)!?W§35PhLSιN¶£뫨²@[öJ2 ûΆ7=Ң̷mЏ^	{̒K\"慄¨\\wøbµگ͜\3¥®ϲJ	%¯񠏐jCö󕶒mֹ 8쳪¬c:ϵHJ ¡t귑*HOKu擶֔11v(Cjú¨ם˫ 򮨜"Ɲ嚴5,/+¤잠Ӫ^Y~ö¦¦¦깊Ĉ\"º֨¶ºƋ©B왆 ³lȎª°(I㺚B@	¢ht)`Pɦ\r£h\\-<h򮴙5锓d¸렐�X@´^7s®AѴ(𫍃ҷõ«Z+-И:M˶#7ðى¯\nNH¾g-֗¸¨7¸h·!\0떎£Ƨc0궄`޳X莞¨³0A÷]ì\$:ºဦ׉⼖Cj잭i·(APߜ"£uuȌȼr0|ፘ:Ȍ\0<&õ߆`z@tÀ9 ^ü)Á¼Dhø/¡¸£ǈ|4@úd\$Áௌ øµ±t4¸ȉ¬\",q·DL[ˣU|䵯-d2؉㒉ꄬQɗG\$\$ 亝Pp\r.ù&A6 쟄0¸R᜜-0¼9Cg\\3u΀\"ЏHm,6ð鐢9򴬆õдAҜrg4¤d`��5µb諒y\"Ό,E⺿d¨8²O\"ciPƐǎ 穰#R5t͘ڻy𾧈¦ٺ ǰãA\0c84؜˙C屰Ӻ´FD)lť羖aT鴛P@@PѫNöޡ¢qµP%҄݄𼨜CrQ̌«¡\" 賎ڿH3񇺷\0棾}羜r4öߺ.;2p7陃IIs톰ѦCHg cM³Ì\nxªȱ«DBS\nA)¿öÁK²\\¨ȸTHb¢ퟫ�JiJú#)dֆA֑ ƹt©߽t]%P±¨iüӊ¡¡ 8§d¢J¶]m5\0 HC˻¥t4t;G=߇곒fFA¶Ǩ1LѰc|Hꭒsk1³±)ADO𞔂¤ør氙´ۈ¶ńAU vƑ¨\"e&k&ÏR¬Y5JªUJp½5Ɋ«Ȣڷ&öɿ¨«\$º7!7ŋ儨 )5&\r`©@蜲2)\"¾ûChɒ08дܢҚɪŗøn	.NDCøi°À¡ÅŐaűnڹ]ka£Q0?uõ«µXV뤖w#«ühڱ±􅨧c݌̭w°Œ\$.oºvʪb-yÕö² ~l\nH5÷P¨h8tpRɡ2»®¥l!畹*bªڱ^T\r:%j|³Á²&Jۧ+sú¡-eºR*ö1l¢³½&OȬ_Á¤3][ڰk,h3LªЦZYXч\"L++Sl¬I²3¬בtʺƮDöj=\\ZƵ)n§rh؅oacUX<õZ퍻h;¬F¦Uz	QvHf*ۉog¡a¹u⢖!L2¹FԝJ\0��,®¹¨¥=0f4©峿-¸羛ƐIö\"׏¬ВAAºW¸З¹鄑!~";break;case"sv":$g="ÂC¨惒̧!ø(J. À¢!蠳°԰#I¸襐LA²Dd0§̩6M Q!¶3Β¤Àٚ:¥3£yʢkB BS\nhFL¥ѓq́ͅ¡Ĥ3\rFñÀ䔴7ATSI:a6&㼰¢2&')¡Hʤ¶7#qߵD).hD1ˤ¤಴ª6蜜ºo0\"򳄢?ԍ¡M\nggµ̦u釒h¤<#ÿmõ­䷜r7B'[m¦0䜮*JL[4kMǨA¸Ȝn'ü±s5矡»Nu)Ԝɝ¬H'믙º2&³ʶ0#rB񼩜"¤0ʚ~R<ˋ湨A§ª02^7*¬Zþ0¦nH蹼««®񼐂P9ȠBp궍±Іm˶֍/8©C¤b²ퟢ�ҋ3Bܶ'¬R:60㸜§-\"ܳ4뫌3°N+ÄEL6ÀP¿¯üժ¥(蔨!cl@\"򜫫®򃌯\0JCʾС\n`PԁèԅZt¸j䦯o#1Ԅ)·̐!£<Is΅d(茔ρe&\"Ή#D,ҀM-N#:䍣HƵ°tH˞\$P#4vmЅԄjZ̝m\r6彨>頜:¦¢@t&¡Ц)Cʹ<± ZUŴ¾JÁª`@¼¯h4Ԭ«a¯H@ϰD\"`Ң:򃮈)5«r3Х\"١uߍ¥#¬#3ᜰڍ2¹¶>9;ûª㴩ՌXϖÒ[)+r6 ڎ旎i¤晃©y潶\$։,hچNªø柨痼º ­eޕ뜰;\r³8hº	Ű \"9hü	µïӬ낋HТÁ脴4C杅ḯхɗǨ£8^㠞¡'½x^ݷ0xe蓗ܨö84|@Aũ۴ダ© :èȽ͵²-ऩ¿ºÁ+ks׸:s݇EҴȯP9u]`ʼ#꯾7vj`|\$£c£̗r@Ȕ´@̍\\3䤻±Ꝉ񲴆ù¾7|댫7¤萇cpą)4V*̥tˊ54	@v|Z\\3¥I³öݕs6/ꁚ<¸pZ\r0Ⱦ®Ɛ{1\$¥@@P±!6 暈0t>ŘÀRɈHVхhx㲇1 s2fÉhÀ߮cX~Q㙔¤|:÷®Щ\"蔽\"x²J»ٿȿgLQZ@LC\"®6)8%@Rь7¢f륦9ЪΪyc8vz43±R=¡X®H¹¬r-(5÷UÂiƬ[¦&M{Po񡮬恜00fX%՜r,᝹ ┐I2AOª1PkÀ揑4\n<)Eþ|1¬ӈ´À@Hꝁ])3bÿ\r'5ԍ[億³Y6¨\n!0õªfHF\nAײ©MD\r%Ӹ2ҖB*j쓲ܯԑ¾&ŀ®ɏ17所°ª@¥C!Ēӥ̶cy쳨\$ƠŏL�m³UCM#\r¬5 E¿Xx𔐏¶ûP%)\"ȡÁ¨8񍀩T*J0qGJ*v¢\n&ª½Ӊѡ¨u^ªՕ͡㥉¨A̚·У©WEؗ!*	ŀ!_3±pਢÀrB	CָĄ¥3|5zµ«Y¨¬: FÁʪuퟅ�R򊎬AJT³H¬a:ᘸp\n\n¡√sþ/*¦\nm¢∓]A[͝´÷iXZ\n⏑p";break;case"ta":$g="ת øiÀ¯FÁ\\Hd_«Ѕ􁫐ÁBQp̌ 9¢д\\U«¤관W¡˨<ɜ\±@1	| @(:\r󉐓.WA訴坏R&ʹ񜜵̩Ӊ`ºD®Jɜ$ԩ:º®TϠX³`«*ªɺrj1k,ꕅz@%9«ҵ|Udߠj䦸¯CȦ4き~ùL⧲ɹڰ:E5ûe&­ր.˱u­¢»W[謜"¿+@񭴮\0µ«,-��[ܗ&󨀐a;D㸀಴&éʳ<´!颺\r?¡Ķ8\nRl¬ʼ¬ΛzR.켒ª˜nú¤8N\"ÀѰ�AN¬*ڃq`½É&°BΡ%0dBªBʳ­(BֶnK檎ª乑ܖāBÀ4ú¾䃈r\$¢¯)2¬ª0©\n*ÛȻÁ\0ʹCx䯈³ü0oȷ½:\$\nᵏ๎󐈠EȊ ¯R´䚄©\0邮zީAꄟ¥¬J<>㰦4㲎K)T¶±B𼥨D놆¸\r,t©]Tjrõ¹°¢«Dɸ¦:=KW-D4:\0´ȩ]_¢4¤b炭ʬ«W¨B¾G \rúĶ쏅&˲̤ʲpޝ񕊀I´GĎ=´´:2½醶JrùZһ<¹­M,ös|8ʷ£-Հ׬ªZ6|Yª¬L©ל"#s*M㜬«𼯙C)J˩W±P㋪µ¡_±°P*Σ¸D\$ýc)IJ6þa+%].«Im|\"ڣ§GZhõõ]XlTґձUh²¸J2FWۦF;~■-쳭dù¸򷁏 ¡xHퟄ�э¾d²§­񭥛­ºº#yÁ˽0_౜r쐥쑎!^ؕ ܥ½Y걒«˫_ͯ̕-\\搅¡klx\$1s+鵅¯浌u/=罌mnB7¸vGmܷ]R՞ö¹ª¸ᛔząۯ±)Ӿ܃ܷ«·½q۞ÿ§񬋏󶼑nC6z©P5ts@PH	\0覄д\nКyA䮲Ԝ"mq«ºõꝒ'쿞¾|Rf\rд񩨢§* ªR*#ȋs`,mݭز\0Qۻ¡9 ޙ0lIఢ\"-% k3g5a®1x ¨Ϩm!¸<\0ꨃ¨cg¼9`ꛁC頹â£haᅜ$	\n݃jH§ܔ0S]樂$ᗹ¤´qH3Ƃއ\$ÁoD鴆c¾Of!Ց¤@C\$\rɞ?5J¨Ü"g\0𰝨蜢\rк\0掁x/󬗔YdÁrjྜྷ��¤=ȟMs쒃8<ᄟ b-ٓ߬,uΈ¬r䬬bþMø㟹}˰¤᜜¸K{Jhٮ@UöÔJ³+Á58p乓úM\0ӓT»¡¢_̙1f<əaަ˘¦攔\rӒCŋ6̜0>	&ö1Pܝ'䅠ޜ<!¬񆔺㔳¦󚔎ü÷͂Rmõ²ý{û,}Ɛ򥈁^\n 񆐇6U( 箼#Ĝ<ªLU¸̓̲ڼG©Zω񬄀0±P@脻!69 ܺB`¢ª殅r{D!SfTo	h\n\n (£%¡*ºdٌ¡ ´؁³§\\ޛ𔐕,³¬󀸞SκOY팭Á= 輏ڶO0¡{X«\$Mǂ^4ý䲥?57	DPU¨ý0яHg`·X#ĘÌ¬ܩ R\rU�­xNhiZ03>Ty¤4sú¯8Ԋýj«VJ°+Ccfד界ý!§ˀPi­l·񶄗º#\nB¶x;F+úRÿ)ƣ\r¹,@类«8yþbú£9ap¥(Ә¤񯝅9x«:vSq¾\"-ö¾Ȳõaق&+Á\$¸ in<'ݐѰ¡ĺ��Hm��û¶CCN6\n䧣ܰ!gdȞxh%䟾(\n<)Lm|G#NªQ㫢J@ﱭÀ&ú|쒕𱧒DÁ怳H\n%°nפ:)¿ZsM·gΠE¥(ІX§k/߄ʐJE��@LΗ©z¥¥mÀ4tù!³~q\$vh%&õF]m:_¶D_=DE`þ1榝hf𦻦Xy ¡pFþ୵u}í@ûݨpᄰsýޒ»*Ͼ8^ú_Mɵù^cUõșCЋ﫮JN¹;ü娱ÿ¼րly䴆0ֈ+L½ֳ6ۚyOÈfµ¯kO%bx½²*@AĲم\$ӷ5WihµpԴ᛺㱧b£O߭矱¹õ˖ǩA瓖½򭛒zA]¸ÿӻ;´(s3@X��󝣰³oAûZ裤¥D	JÀºDLõA7¨u'Α⹦רy٢w·µ/=ú³ङCf·TM\r%n@y樉^0³À7ۍù±¡^B? ¤-¦nüª¯/¹ׂuUL@ʗ뀕눜n	¸Ԕw򾓁i,lLH6g Ĝn4fºþ2úJGOZՄ쭜$ʣ¨ퟹ�®ԓ^y\0¦ù\0ʬ놉h>{ΚbfL2úøMܼ㯚͠\"1툲傴`{ㄦǜ/|<D't00𥷃g¤ü䔁0þüù£";break;case"th":$g="ܜ! MÀ¹@À0tD\0 \nX:&\0§*ܮ8ޜ0­	Eó0/\0ZB (^\0µA˅2\0ªÀ&«b⸸KG˘nĠ	I?J\\£)«b咮®)\\򗓧®\"¼s\0CٗJ¤¶_6\\+eV¸6r¸Jé5kҡ´]본õĀ%9«9ª更·®fv2° #!Ъ65ƺ臭\ (µzʳy¾W eª\0MLrS«{q\0¼קڼ\\Iq	¾n뛭R㼸馛©7;ZÁᴉ=j¸´ޮ󹪞°Y7D	؊ 7ć¤쩶L擘蹎£Ȱx贜r/訰O˖ڶ푰²\0@«-±p¢BP¤,㻊QpXD1«jCb¹2±;賤\$3¸\$\rü6¹Ð¼J±¶+纮º6»Q󄟨1ښ哠P¦ö#pά¢ª²P.劖ݡ볜0𰀐ª7\ro(乜r㒰\"@`¹½㠞þ>x萎pḏㄮ9󈉇»iú؃+Ō¿¶)ä6MJԟ¥1lY\$ºO*U @¤Ņ,Ǔ£8nx\\5²T(¢6/\n58燻 ©BN͈\\I1rl㈈¼Ôę;r򼬨ՌIM䦀3I £h𧤋_ȑ҂1£·,ۮm1,µȻ,«dµE;&iüdǠ(UZ٘b­§©!Nª̔څܞ±º«»m0´A÷\r仮B,坷*;\\I̷B¬§õܹX\\5o}aS{X,BҠ¯ֈg%'¨幋®ú\"ᣇPӃ,Ŋªg(Ȯ򺶫\$#\"L僉r¢/ԸA j𘫨b®׷;ºDΚ4頚b왌`\\i묜ܩ|ʙ˛�숞,°±d0jvʫ8gN\\gNºu«¼¥T¸q1ijí]Gՠ䥓ɕ_tѼƓٮúº®؄H\$	К&B§xIʬ)cʹ¨P^-µeÁj.��%vẍ́±B\$?5ퟁ�hn¼Ŀ𤿃(x@¡¸9߃y䔭AцÀ蜀Q轁9𞙃0lJ¡✑P⒈�¼֚pi\0ih܅@޼ha\rÁ䐇XCc?̳P؈`o锹ü¡ࡌᅪª	[PmJ¡Ղ朮P{̉N¹°ó~·	ûY(i©27³yX\n±4Ѝ\0¬\rJÀ H´tNp>D܈ࡽpt3Є t̝𞝤À.1ú§\$♁xe\rÀ½=@ 郥\"ҕ%PΏxaŠ)ĹPª[;LEõdHଅ:©.HƦЋSE1�eȬ\rᒅ0�n®JÀMN薃¨`梔RmÀ4Á՗\"\$Ph:HI))%¤ÀwRr@I२%¡RÀ𞈌@>	!´8ۨ¤°Oú pޚø !¬÷\n¡̀\rÁѨ¬sPsVʝ*¬ќ\ A-fü¨A ÷ǩภ碣#ޜtwTµͷ@S~\"ĸӥ3@纖(\0ÁÁ\0cԠ4دݩ:G=\r<¡p«\\R°S꬝ef㪵`[+2¶ÀA\0P	@\nUK㮜nÀ¶ʷ&z汋¤©R®¾W㤽±ø?Aµ(0䝏ꉏ©þ«D數Zn¢§öE5\r¢²l@��¸|ԺM¨; ƚ(i򀐓j{Øa0MapÁκºVr𐄰¦3kc§I䜢ŇM^</ՙ±¶ʹXAoºי\\.tc܉]¬�K؛ݯqŅN¥ª±a]-ء¡ٙͻn~a6NV℮u|VI%'¤@ҚOº ûCu?ü3'\0۟'¤µi°1Ĕ񓬒?h>ۼߡeq)ٗۄVʩ=¤e\$\\cL·0\nU\$σތ|Ȝ0mi¶!BQ񮹜n¦:��iũ\\󂨕Ц¹P|)pSb2lH Ů©8Q	3Y @}䐆\nҝ6 Ӂ\$VĘ@&㜜ƪ¯8ϥ¦[\$ý!­6@ܴq·Y²˴°	|l2󉊷ýΆTVYY穒²v©ԍ񥝠Ӛ{­¨K45-1©ʉۗ¡ÀWCHc\ryLûüγ**em¿Ұ³𭏩þ߅Pª0-A᤬V\"ë;i5LiR簎n=ֻ Ɨ²	A[ﲝzpA3°À(&аҙη.硯ª8ܨ靉ꁈ��Å7L¥q¢ÀˍYS§¿<dK¶fԹ̾i>ݹ邜"ǺÁû©X	¿:ԢS¨\n貮Wv\r£,l1X_\r#W՛&­§yk꾔)ù¥öP¬¡G#	͈³+7j¡r²WwÁ6.	¿G	]85ü򮼡¹^þ2´P[ݥ\n𢻢reak;case"tr":$g="E6M	΄i=ÁBQp̌ 9󙤂 3°ֆ㡔䩶`'yȜ\\nb,P!ڽ 2À̑H°į<NXbn§)̅'Ţ擩؇:GXù@\nFC1 Ԭ7ASv*|%4 F`(¨a1\r≡®Þ¦2Q׼%O3㥐߶§Kʳ¼fSdkXjya䊴5ÁϘlF󝺂´ډi£x½²Ɯ\õFa63ú¬²]7F	¸Ӻ¿AE=锉 4Ɏ\\¹KªK:匦єܫ7ΰ8񊋈0㌆ºfe9<8SԠp᎞Ùފ2\$ꨀ:Nب\r\nڬ4£5»0J©	¢/¦©㢐킣:/B¹l-АҴ5¡\n6»iA`ЍH ª`P2꠩H욼4m۠³@3¦úm ұȑ<,EE(AC|#BJʄ¦.8д¨3X³8±bԄ£\"lÁLû?-Jݎlb鄁°\\xc!¸`PЍ򰤺#ȫ ­&\r(R¬¬³2³k蚼ld#򢕸#ªú亢=hºt˗¢c ؉PS퟉�uىx٥K-J繢t\"Цc͌<¡h°£8΅\nɺ!VƵВJݜrׂø߰ʼC£rΩ=IX²𔶉`QC©¨øڲ'˪|9§и��¨ܺ©ø\rxʍ°ᜰ̰PH@7§c꜌,ܸۜrɓ࣢Ä6e\"8H֋nC£[M£¹貑\$⾫ϫ,9ٻz\"N {MF©㩳GL%ꊲc\\Zݙ-xʳ¡к杅ḯǅ־ԏɨΗ¦!zg~KA󗸖+*谎唗+\"ȇxk:۲9Źú£5¨X\rÀ賃ڎ¦M½6취Amܓ÷焃wv¸ꗄٲ(sTy,˶oᇃÁ𼿓ű¼x()˳w1&8?􈊨>@E0»ֆ읚B§m朰¦´Y±¹#¬0©s>qYlG|X´BLI\"w手¡5JxlK¼蒖º'ڸ±l\$]A¸΅;Ce1괢.CN9%Α򂤃\\E\$ᕂ䎹K©>\rD³҆@P9U΂Ū@ÁAE/©L)£S\nqP*EP66p򂃙leq?4-ϑ1%¼熧гª\"䠖茈Ϲn\r\n،~̙ a҅ɠԏڣ?Áɿu.с騫£u=¤&tB\0(aL)hƚú¹{Ӗޞ9\$;D²!䠬½uBõӤ®O̸O (և¢񇁑>>s#P아\r¡ɇ NՖ:µP螓hÑ<^ᥗº¶~⸮\$챪򞌀P	ጪҾAüȪ󍂱:銉@F	EhG)BAԼvEPQĴ휮k6RB0TS\n3 Ł¨BSaL(ǶR¦\$ϥd¦͹õde=50k!8uR\"Iͱ\"@°)HʅU±VSۂ95u\0§斢,+-fͳY[ꕲ¬ոġlTהkM¾\"w̧°%촐4\\O/骁\$4¨TÀ´!0ޙK㣨6Á²}«jy®yUc5ڭuY澕UªG有µ홚滟9³[ś#hª=%)²¤.)|À[nʨ³諠3n/¶¦40D\nséL=PˠY¡T蒔c?c-š۫Z 낻¶Uް*»·XoY5FUg]º:d¥'[­鲏÷R2ͥp�þU.Àr";break;case"uk":$g="Љ4ɠ¿h-`­즘ыÁBQp̌ 9	ز񠾨-¸-}[´¹Zõ¢H`Rø¢®db蒲bºh d±隭¢Gˈü¢ ͗\rõMs6@Se+ȃE6J甤Jsh\$g\$懄­fɪ> CȦ4がj¾¯SdRꂻ\rh¡哅ն\rVG!TI´±̐ԻZL¬鲊i%Qςך؜vUXh£ڔʂZkÀ鷪¦M)4⯱55CBµh¥ഹ扠Ƞ҈T6\\h¾vc lüV¾¡Yj¦׶øԮpNUf@¦;Ifù«\r:bՐibﾦܼj i%l»��ʜn§Á°{ٻ¨yל$­CC I묕#D��\r£5·ЃX?jªв¥ֈ¦)Lxݦ(kfB®Kø疉{ª)扩Ư󪆈m\\¢F \$j¡H!d*²¬B²ق郴՗.C¯\$.)D\n扐Ĭb̹­kjķ«ª\\»´­̐ʾD¡ҥ¶\rZ\r隅1#D£&Ͽl&@ԱÁ M1Ĝ\÷¡ɑ`hr@:¼®ĭªþ¦,¼¶΢[\nC䪛(m,¨r¼L׊Á4»\"윴£чUN/¸;s?K«¡®s3ªɂcH¨(Ȃ4^·ܜØ~ղ}MÆt%İ¡pH⁍΄\r^Á2ø[\$¨уkJV͇A\\D[sPבB¦Xƍh£Ҷ5҄ԩ©\$cõÿїW(®þWF-^&鴫B©X{7Ǳ󟙑ᰒ´ꊒ¬꺚눻-(lN扳mN¯µ·zԅ·¬ؓUGHö솭r4iV&/#Ȥ圮4¦s^v@s⮭«1¬	\$Xø4cĶ³ø@7A\0ʷu݇eڶC(𺶣ҷԆM¹MtZ6l릻rt^­y=`=ý˖:Z泷_>V¸h\\T��렜$+��\\dÿfA¦\$;¹¬µ5`B»&˩a잞뼊/´GLڋ榯¡õ'컖K񙯐§%¦p^ۺm轾'þ ퟂ�%@L`[jaͱ¤ҔA93°t¦Á²û򃐝8'\$9ά%>莜0µ蔉`3Թퟢ�¥S٩Nŕ6.YǷE\0»Q|mJMk¦Ԫq߉QL2В(rL͊  þt<\$ర\0М(f 4@蜃:༻ɐ\\c¬w ¹چp^큸dx:<0܋Á>!eĺ´xÈ>z§ݸh´q.2EM1G(÷۪`keղe²sӐJSYb_ʔ,±D֣Ձ\\7´¥ӊ؊mi`Ēx\"ùv7Hi\"¤dJJIi1£ÀrʏJ|𞬦UbQNry\"W˒®	¡ÿO񢵾ґ9X,8D萃Gȡԩ¾zeY®ù¼׍2X¬\r£¢RA§1b1^/Ľ V­P氹вl瘏¬®§´=G|@o³NfŃ`GJ|[>q|d溎r­XEUc¦UKZ73a<§³fJ97ͭ: -¬龓\"Ag4QµTú®\\Қ\":eӨ÷[PخEĵö襊5͐ꑴ¦sM󶣈)%>¾®Փ^ƽk؜"vKX£©-яɦB˅BY'Á㜮ㄣ\$¥^3\"JlT:À6r�:©恵IJ¬0¦1橔ɹVٝ\n1tWI覩¤M£Qrqbް.n¡¢C<ŉÀ¸Y7«ީYbcr	!u&Gê®«Ud5ޡ¦BUɋ8³%=۶˘¯aѦ+Sg滮CDC븑A/Nђ|G{l!<6gQw6𚍨p*¦rė«©QÀ@xS\n_˪t.c·k>ܸU%¤|&̗۠2磥8ª䯝J΃%2¢TЃ9<GDࡢ<H	¹8K󢈨ֶEo)z½.Á\0S\n!0Bd!\0B0T\n⽈ºeP>ڑ\nq{ж/u=o͋䘐咋�׀Ԝr쭋dGõ>!%UŪ[¨#XP¯i´ùN̂úɼk͘1¥ؘT-ڲȘ\rulż¦ù¡°¼«²򘎘¾3Pə3½l誎ך»<ª½-¬҂ݚÿ,+OoМ͌µ.ά@@B F ބ瀮к֤GGˀڦ¦`ƣgΖ\\ή¢;÷peoחἩ7qˎf̖{¦	³ÏA¢°h7_ٕ͟&sri𼗯! t귄¥¦¡T)㬸9JN\$߂ߎ𫡊-ù©3帶ձ«ξ±Τ»;õ¤'xj둆}疈ɱs Ɖėa\0߃µlgzú≡¤q5wŔgભM:6q»PК­u-®n%peaݟ攳S#B¡5>Ҳ*i±槩uR4£�4j��&3eմ0";break;case"vi":$g="Bp®&၍³ *󘨊.0Q,ЃZ⃤)v@Tf\n펰j£pº*Ö͑Ã`ᝦ̲Y<#\$b\$L2@%9¥ŉĴחƎ§4˅¡Ĥ3\rFñÀ䔴9N1 QE3ڡ±hĪ[J;±ºo眮ӈ(©Ubµ´da¬®Ɖ¾Ri¦D农0\0A)÷X޸@q:g!χC½_#yÌ¸6:¶댑ڋ̮򊚭K;׮𛭀}Fʍ¼S06½¡÷\\݅v¯렄N5°ªn5縡䲷¥ă	Ђ1#ʵ㨦͍㢦:󅎐滿#\"\\! %:8!Kڈȗ+°ڜ0Rз±®úwC(\$F]႒]+°氎¡Ҏ9©jjP ed²c@꜒㊪̣쓊X\n\npEɚ44K\nÁd±Ȁ3ʄ蔦ȡ\0گ3Z찟9ʤHè©\";¯mhãCJV« %hᾥ*l°ù΢m)艒ܘA¯°픅򃬠ӵ\rE񪩈\$@·0̃Ȳ:¡@攁LpѪ PH¡ gd³ᘩn	~ůE,1§L򡔍˄]逰ꑵ*pM¤ꆅ	\n,³<ĎʅS²º'HAyУdǇt΁ɒJpSޅقS©޵eC#ȵr¦֜󕲸Ѩ􂱶	К&B¦cΜ\<¡hڶ£ ȅ֊²숔\"\r1¸Ķ@j@@üߣsÿ¢Gz8妌£Ÿ7cLQgõf9Ń@6-\0P²7³C偍㰌6;c*]635𝔵«¼Pü渘eª'A£聿­�ﳸûV͜rhX\"圌½\\j±¿³UÀAeԔ72£\n]Ȉ@Υ׃ڀ몮ȶ�1꣈Ȼ↴l㰺\r 踎aОþ\\0öýȜ\üḊ7㜤PþꞠD{ڐ譌᠞0ɰ¡Ъ!@黊jw HP龺qü̪³TD¡˜n¥ЭSuM±§ uPRꥯ἗򞛍y½7ª³׎Oe�¤öڪ(Ȥ㎺0¡&Oȶ¾§؂Ihga0°°º-sht.Dд)%ªՁƹр ᤶ²Áöv!ȶUrC2¼iጺ0ǒC0uÁ°7¦	ȩ4@hޮVίó猡±¬B¢✂E腙£Tꨋᷔ=¡nH\nѩ¢<%Ȣ3HDȷ£´.!O}rN\0䚎ӄ񹍠􎐐B\nq°;ŧX}°(a͈ư@v㔿\rÁÀ:¡\$¹쾙»βb¼Áhၶ��À:e ¡0¦3\r/õ ¦d²ªɊs\$(34Ő«®±i §,¢jؗHh*¤­p 簁F¡ѹ]-쵉\0'K±ŧ饻JEŉĿ ©ٶgy@¤\$[!뷒Ɯ$殇лg5c𴝳¸\r<½²@膕¶xیɡCŐ𠓂TpΡƓ&»\\g8\"hfƉ¹9'gѢ-뜾 ¤Rɡ+x(qD@dwIѡPԨY #񄅘#I&s܌蹲t1aBDɂ1=Z¤i惄mu'}љ7:'<	u6R	sE삿h_úzbU#亩H C-ZĭW蟪ӈ-	^Y茲>5-7¿б1©)M@ª0-!Zퟤ�2uYxýDH񠏌ꉳ۬zn8\nE쩙KXuVp<\0£r"/®u_򆕫靶&ڜ\pŘ3eڳui¯­䧊uY4梦ᬌi-0¤਷-ȑÁÁHr2I:°av#U¡رaE.±ီ©[ւ҃'÷t¥Fͪ*ºʼ儀\$o4¾ÁΓ5{l®N";break;case"zh":$g="恪ꕳ\\r¤|%̂:\$\nr.®ö2r/d²Ȼ[8Ј S8r©!T¡\\¸s¦I4¢b§r¬񕐀Js!J¥ɺڲr«ST⢔\n̨5\rǃSRº9Qɷ*-Y(eȗB­+²¯΅򆚏I9PªYj^FX9ª꼁P渜܉ԛ¥2s&֒E¡~ª®·yc~¨¦#}Kr¶s®Իkõ|¿iµ-rٍÁ)c(¸ʃC«ݦ#*ۊ!AR\nõk¡P/W¢ZU9ӪWJQ3ӗ㱘¨*駏s%ʯC9Ԉ¿Mnr;Nᐁ)ŁZⴧ1T¥*J;©§)nY5ªª®¨繘S#%ʮāns%يO-糑0¥*\\OĹlt墰]񶲑²ʞ-8´儜0J¤ټr¥\nÑ)V½»l½¯§)2)n«K𽐫)3¤«ú'<רM̡ʝQsš㠁RL뉠SA b¥¤8sN]Ĝ"^§9zW%¤s]AɱъEtI̅1j¨IW)©i:R9TْQ5L±	^¤y#XM!,ü 5ոBöm@?Á·\n£¼\$	К&B¦c͜<¡pڶàȅVi==)M8»ª0搄¤²WÀXDؔAЙK´`PغIjsřΝ硴C1¤⠅2􁹐넥6I!btX¹1񎘓HdzW굦Dǉ\$¶q҃£ey*ƑVO岱tƐùИP¶ ڴè埿ǁ\0Aɜ"¢D»yvV@4C(̞C@躎t㿌;ɳø䳅㨜xܰO,A󔌕򘄝Yb%	jt¥DxȁxM:mD/F{F¥¬櫶ª茕3¿p±eޓúº÷¾／°üNǲ\\oȲc(𺲃5ɄJ8|ÿa𩫘öxq,\\ř*AqsÁȮD(呂Y\r񜮪QPat»^'O󾦴VA̜$Ī®(\"q\"V¤\"û^@CM#	ȄJɠż4ҐP§.¢0ƙ8¬[ʛÁᜮA\0P	AC³`X¨te׼R4`©73¸sነ瑯ЊqV+֨£1¤¾	3\nO¹ù?g,¹ pxK8攂񴙸G覐ܞ,hrǓ µ¤рcL2.\0!0¤'j³ü𓲎Zr֞^@¶¯0( MÁ:CWT��J?ÔQ	喨s	ḣ鐇\$悶۲ړm\0shᬁWRꝩW\n<)Fz̙1DþY4¬#ʈ_-¶¨-e»\n\"N©񊜤H𻔑񞉏 wüC`¨ù!ý°¦BaL'ƾb掊Rü|8(ml㠪E̜$1ᥙ6% ¤TpY󂠩PȈ¼-)#鉅➬%b9`Á^ퟘ�a½©0C©>\$\r向��fiq񗨌aˁ D\";¡T*`Zڨ*��ª4`ⱛ#«噊¦°±««\"P\\¯2T!iC @CL\\\nKfଵ򄭋詒bú*!^ōwªB񜲈¡@:칳L򵪉oh򆟎©֥\"\\LI-\"\0¹'/R=l\"0´¡u򲋈¤*	3ƭqN	i*¦6)%((­)ү0ͽWª´R,";break;case"zh-tw":$g="䞨꥓\\r¥юõ⼔%̂:\$\ns¡.eUȸE9PK72©(搢h)ʅ@º:i	%ʣ觊e 咩ܫ{º	Nd T␈£\\ªԃ8¨CȦ4がaS@/%ȤûN¦¬Nd⥐³C¹ɗBQ+¹֪B񟍋,ª\$õƧu»ޯwԦT9®WK´͊W¹§2mizX:P	*½_/٧*eSLK¶ۈúι^9׈̖\rºە7ºZz> ꔰ)ȿNnٲ!U=R\n¤􉁖^¯ܩJőT珩](ſI؞ܫ¥]E̊4\$yhr䲆^?[ ��rº^[#嫢֑g1'¤)̔'9jB)#,§%')n䪪»hV蹤��Ѐ§IBO¤򠳒¥¦K©¤¹Jº籲A\$±&븭Qd¨ÁlY»r%򜰊£ԀD&©¹Hi˸¬)^r*Áʜ\gA2@1Dµ䉶ªi`\\ɋ>Ϥ-汇IACer2򺌡@攩¤ĶHÀPHÁ gRªi N(kȝg1Gʇ9{Iı\$ýҺ 鱖¤开я_sùZH\$kWα|C9T뗕.¬'¤%¨䡊CItW\\ׂJ(d\r£ie´؇ʲ°\$	К&B¦cΌ<¡pڶàɣٜ$ü(ÁL@Á±(@s±ʊøʕ㸔5CфDB6ú¬\r 䋕I6Q0Dш]̱ȞK¢¥8£õϴя̒2.ѣr	Ҁʁ4Dwt\n©|F\$9t%4ND'䖃£]9Oa:F¥@2\r£HܲZƴא̂ʶD-i\"!\0й£0z\r 踎aОý\\0\0\r㐎£p^2\r㰂:\r=^ǱH4E򘄝^K缯G(a㈼Bʹ}¨ݮź\$pPVʆµE[³̏^ԐÀr)˳׹ϴI¾QյpʞÀnz®ؑ |ٸ喜"U漦L%ɜ£ W	2ᔚ£F	c,��k¢ý([d'±шi\0UÀC¯¦8ۄûxA£M¤! q	°挨hM4¹哢܊&Ąɻ)D(ǙŞ.ҹÿ@\"Ѳ\0 uűʼH!bj¹¨@XqMJ̘T¢+揨V+\09g^5Tk\r\0萢��#ʃ¢=D̛(d±0µȍ\0C\naH#\0蛃[­0\rﾑ2/\rQ1/ÔK\n㰭˔%䄙Ȕ`9pµHᲔX'\$9A5¨ 839DP D¦Г!̧঳,͗Qʯ󻿎>ˁ\0LPP斜"	ҥĢM#<ҧE\n<)@@Ŝn\0ª(Àap&ʚh/Ŏ	do̤؛L2!ZAAi ϊõ^|\0{A*vHG¢,)N\r짹́¡'\nH,ª?¥��+@腈@º\r)§1*9HK鉔IͪmʀJ¼\ru[R&}	/cx蜆\0#2\r.¶9ù?5Ӎ)C®+ø¹D䘲Ta윮¡P#аqP9´]gр5ț)ɛ#­M±:řy֗ö\0J|&J@51=CڜⰴN<:=ׇD\$\"ׯöüÁ *Vb㨄*¯\0)³Bsâ򜮨rߍõW踡©��:#b��ѻSz%ŞÁ̪թ⢦L¿+Ų핤(鞣ࢻbreak;}$wg=array();foreach(explode("\n",lzw_decompress($g))as$X)$wg[]=(strpos($X,"\t")?explode("\t",$X):$X);return$wg;}if(!$wg){$wg=get_translations($ba);$_SESSION["translations"]=$wg;}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$Me=array_search("SQL",$b->operators);if($Me!==false)unset($b->operators[$Me]);}function
dsn($Pb,$V,$E,$C=array()){$C[PDO::ATTR_ERRMODE]=PDO::ERRMODE_SILENT;$C[PDO::ATTR_STATEMENT_CLASS]=array('Min_PDOStatement');try{$this->pdo=new
PDO($Pb,$V,$E,$C);}catch(Exception$ec){auth_error(h($ec->getMessage()));}$this->server_info=@$this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);}function
quote($P){return$this->pdo->quote($P);}function
query($F,$Dg=false){$G=$this->pdo->query($F);$this->error="";if(!$G){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error=lang(21);return
false;}$this->store_result($G);return$G;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result($G=null){if(!$G){$G=$this->_result;if(!$G)return
false;}if($G->columnCount()){$G->num_rows=$G->rowCount();return$G;}$this->affected_rows=$G->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch();return$I[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(PDO::FETCH_ASSOC);}function
fetch_row(){return$this->fetch(PDO::FETCH_NUM);}function
fetch_field(){$I=(object)$this->getColumnMeta($this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=(in_array("blob",(array)$I->flags)?63:0);return$I;}}}$Mb=array();function
add_driver($t,$B){global$Mb;$Mb[$t]=$B;}class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($Q,$K,$Z,$Jc,$se=array(),$z=1,$D=0,$Re=false){global$b,$x;$pd=(count($Jc)<count($K));$F=$b->selectQueryBuild($K,$Z,$Jc,$se,$z,$D);if(!$F)$F="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$Jc&&$pd&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$K)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Jc&&$pd?"\nGROUP BY ".implode(", ",$Jc):"").($se?"\nORDER BY ".implode(", ",$se):""),($z!=""?+$z:null),($D?$z*$D:0),"\n");$Qf=microtime(true);$H=$this->_conn->query($F);if($Re)echo$b->selectQuery($F,$Qf,!$H);return$H;}function
delete($Q,$Ye,$z=0){$F="FROM ".table($Q);return
queries("DELETE".($z?limit1($Q,$F,$Ye):" $F$Ye"));}function
update($Q,$N,$Ye,$z=0,$L="\n"){$Rg=array();foreach($N
as$y=>$X)$Rg[]="$y = $X";$F=table($Q)." SET$L".implode(",$L",$Rg);return
queries("UPDATE".($z?limit1($Q,$F,$Ye,$L):" $F$Ye"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$J,$Pe){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($F,$kg){}function
convertSearch($u,$X,$o){return$u;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($rf){return
q($rf);}function
warnings(){return'';}function
tableHelp($B){}}$Mb["sqlite"]="SQLite 3";$Mb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($q){$this->_link=new
SQLite3($q);$Tg=$this->_link->version();$this->server_info=$Tg["versionString"];}function
query($F){$G=@$this->_link->query($F);$this->error="";if(!$G){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($G->numColumns())return
new
Min_Result($G);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetchArray();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$T=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($q){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($q);}function
query($F,$Dg=false){$Vd=($Dg?"unbufferedQuery":"query");$G=@$this->_link->$Vd($F,SQLITE_BOTH,$n);$this->error="";if(!$G){$this->error=$n;return
false;}elseif($G===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($G);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetch();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;if(method_exists($G,'numRows'))$this->num_rows=$G->numRows();}function
fetch_assoc(){$I=$this->_result->fetch(SQLITE_ASSOC);if(!$I)return
false;$H=array();foreach($I
as$y=>$X)$H[idf_unescape($y)]=$X;return$H;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$B=$this->_result->fieldName($this->_offset++);$He='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($He\\.)?$He\$~",$B,$A)){$Q=($A[3]!=""?$A[3]:idf_unescape($A[2]));$B=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$B,"orgname"=>$B,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($q){$this->dsn(DRIVER.":$q","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($q){if(is_readable($q)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$q)?$q:dirname($_SERVER["SCRIPT_FILENAME"])."/$q")." AS a")){parent::__construct($q);$this->query("PRAGMA foreign_keys = 1");$this->query("PRAGMA busy_timeout = 500");return
true;}return
false;}function
multi_query($F){return$this->_result=$this->query($F);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Pe){$Rg=array();foreach($J
as$N)$Rg[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($J))).") VALUES\n".implode(",\n",$Rg));}function
tableHelp($B){if($B=="sqlite_sequence")return"fileformat2.html#seqtab";if($B=="sqlite_master")return"fileformat2.html#$B";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
get_databases(){return
array();}function
limit($F,$Z,$z,$he=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($he?" OFFSET $he":""):"");}function
limit1($Q,$F,$Z,$L="\n"){global$h;return(preg_match('~^INTO~',$F)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($F,$Z,1,0,$L):" $F WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$L."LIMIT 1)");}function
db_collation($l,$bb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($B=""){global$h;$H=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){$I["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($I["Name"]));$H[$I["Name"]]=$I;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$I)$H[$I["name"]]["Auto_increment"]=$I["seq"];return($B!=""?$H[$B]:$H);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$h;$H=array();$Pe="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$I){$B=$I["name"];$T=strtolower($I["type"]);$Db=$I["dflt_value"];$H[$B]=array("field"=>$B,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Db,$A)?str_replace("''","'",$A[1]):($Db=="NULL"?null:$Db)),"null"=>!$I["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$I["pk"],);if($I["pk"]){if($Pe!="")$H[$Pe]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$H[$B]["auto_increment"]=true;$Pe=$B;}}$Nf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Nf,$Nd,PREG_SET_ORDER);foreach($Nd
as$A){$B=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($H[$B])$H[$B]["collation"]=trim($A[3],"'");}return$H;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$H=array();$Nf=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Nf,$A)){$H[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$Nd,PREG_SET_ORDER);foreach($Nd
as$A){$H[""]["columns"][]=idf_unescape($A[2]).$A[4];$H[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$H){foreach(fields($Q)as$B=>$o){if($o["primary"])$H[""]=array("type"=>"PRIMARY","columns"=>array($B),"lengths"=>array(),"descs"=>array(null));}}$Of=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$i);foreach(get_rows("PRAGMA index_list(".table($Q).")",$i)as$I){$B=$I["name"];$v=array("type"=>($I["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($B).")",$i)as$qf){$v["columns"][]=$qf["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($B).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Of[$B],$ef)){preg_match_all('/("[^"]*+")+( DESC)?/',$ef[2],$Nd);foreach($Nd[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$H[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$H[""]["columns"]||$v["descs"]!=$H[""]["descs"]||!preg_match("~^sqlite_~",$B))$H[$B]=$v;}return$H;}function
foreign_keys($Q){$H=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$I){$Cc=&$H[$I["id"]];if(!$Cc)$Cc=$I;$Cc["source"][]=$I["from"];$Cc["target"][]=$I["to"];}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($B))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($B){global$h;$kc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($kc)\$~",$B)){$h->error=lang(23,str_replace("|",", ",$kc));return
false;}return
true;}function
create_database($l,$d){global$h;if(file_exists($l)){$h->error=lang(24);return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$ec){$h->error=$ec->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$h;$h->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$h->error=lang(24);return
false;}}return
true;}function
rename_database($B,$d){global$h;if(!check_sqlite_name($B))return
false;$h->__construct(":memory:");$h->error=lang(24);return@rename(DB,$B);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){global$h;$Ng=($Q==""||$_c);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Ng=true;break;}}$c=array();$xe=array();foreach($p
as$o){if($o[1]){$c[]=($Ng?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$xe[$o[0]]=$o[1][0];}}if(!$Ng){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$B&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)))return
false;}elseif(!recreate_table($Q,$B,$c,$xe,$_c,$Ea))return
false;if($Ea){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($B));if(!$h->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($B).", $Ea)");queries("COMMIT");}return
true;}function
recreate_table($Q,$B,$p,$xe,$_c,$Ea,$w=array()){global$h;if($Q!=""){if(!$p){foreach(fields($Q)as$y=>$o){if($w)$o["auto_increment"]=0;$p[]=process_field($o,$o);$xe[$y]=idf_escape($y);}}$Qe=false;foreach($p
as$o){if($o[6])$Qe=true;}$Ob=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$Ob[$X[1]]=true;unset($w[$y]);}}foreach(indexes($Q)as$td=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$xe[$e])continue
2;$f[]=$xe[$e].($v["descs"][$y]?" DESC":"");}if(!$Ob[$td]){if($v["type"]!="PRIMARY"||!$Qe)$w[]=array($v["type"],$td,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$_c[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$td=>$Cc){foreach($Cc["source"]as$y=>$e){if(!$xe[$e])continue
2;$Cc["source"][$y]=idf_unescape($xe[$e]);}if(!isset($_c[" $td"]))$_c[]=" ".format_foreign_key($Cc);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($_c));$eg=($Q==$B?"adminer_$B":$B);if(!queries("CREATE TABLE ".table($eg)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($xe&&!queries("INSERT INTO ".table($eg)." (".implode(", ",$xe).") SELECT ".implode(", ",array_map('idf_escape',array_keys($xe)))." FROM ".table($Q)))return
false;$Bg=array();foreach(triggers($Q)as$_g=>$lg){$zg=trigger($_g);$Bg[]="CREATE TRIGGER ".idf_escape($_g)." ".implode(" ",$lg)." ON ".table($B)."\n$zg[Statement]";}$Ea=$Ea?0:$h->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($Q));if(!queries("DROP TABLE ".table($Q))||($Q==$B&&!queries("ALTER TABLE ".table($eg)." RENAME TO ".table($B)))||!alter_indexes($B,$w))return
false;if($Ea)queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($B));foreach($Bg
as$zg){if(!queries($zg))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$B,$f){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($B!=""?$B:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$Pe){if($Pe[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($Vg){return
apply_queries("DROP VIEW",$Vg);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$Vg,$dg){return
false;}function
trigger($B){global$h;if($B=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Ag=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$Ag["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($B)),$A);$ge=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($ge?" OF":""),"Of"=>idf_unescape($ge),"Trigger"=>$B,"Statement"=>$A[4],);}function
triggers($Q){$H=array();$Ag=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$I){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Ag["Timing"]).')\s*(.*?)\s+ON\b~i',$I["sql"],$A);$H[$I["name"]]=array($A[1],$A[2]);}return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$F){return$h->query("EXPLAIN QUERY PLAN $F");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($tf){return
true;}function
create_sql($Q,$Ea,$Uf){global$h;$H=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$B=>$v){if($B=='')continue;$H.=";\n\n".index_sql($Q,$v['type'],$B,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$H;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($j){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$h;$H=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$H[$y]=$h->result("PRAGMA $y");return$H;}function
show_status(){$H=array();foreach(get_vals("PRAGMA compile_options")as$qe){list($y,$X)=explode("=",$qe,2);$H[$y]=$X;}return$H;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$oc);}function
driver_config(){$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);return
array('possible_drivers'=>array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite"),'jush'=>"sqlite",'types'=>$U,'structured_types'=>array_keys($U),'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL"),'functions'=>array("hex","length","lower","round","unixepoch","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",)),);}}$Mb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($bc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($E,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Tg=pg_version($this->_link);$this->server_info=$Tg["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$o){return($o["type"]=="bytea"&&$X!==null?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$H=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($H)$this->_link=$H;return$H;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($F,$Dg=false){$G=@pg_query($this->_link,$F);$this->error="";if(!$G){$this->error=pg_last_error($this->_link);$H=false;}elseif(!pg_num_fields($G)){$this->affected_rows=pg_affected_rows($G);$H=true;}else$H=new
Min_Result($G);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
pg_fetch_result($G->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=pg_num_rows($G);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;if(function_exists('pg_field_table'))$H->orgtable=pg_field_table($this->_result,$e);$H->name=pg_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=pg_field_type($this->_result,$e);$H->charsetnr=($H->type=="bytea"?63:0);return$H;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($M,$V,$E){global$b;$l=$b->database();$this->dsn("pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' client_encoding=utf8 dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$E);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($rf){return
q($rf);}function
query($F,$Dg=false){$H=parent::query($F,$Dg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$H;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Pe){global$h;foreach($J
as$N){$Kg=array();$Z=array();foreach($N
as$y=>$X){$Kg[]="$y = $X";if(isset($Pe[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Kg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}function
slowQuery($F,$kg){$this->_conn->query("SET statement_timeout = ".(1000*$kg));$this->_conn->timeout=1000*$kg;return$F;}function
convertSearch($u,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$u:"CAST($u AS text)");}function
quoteBinary($rf){return$this->_conn->quoteBinary($rf);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($B){$Fd=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$Fd[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$B).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Tf;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$Tf[lang(25)][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$h)){$Tf[lang(25)][]="jsonb";$U["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($F,$Z,$z,$he=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($he?" OFFSET $he":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return(preg_match('~^INTO~',$F)?limit($F,$Z,1,0,$L):" $F".(is_view(table_status1($Q))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$L."LIMIT 1)"));}function
db_collation($l,$bb){global$h;return$h->result("SELECT datcollate FROM pg_database WHERE datname = ".q($l));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$F="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$F.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$F.="
ORDER BY 1";return
get_key_vals($F);}function
count_tables($k){return
array();}function
table_status($B=""){$H=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f', 'p')
".($B!=""?"AND relname = ".q($B):"ORDER BY relname"))as$I)$H[$I["Name"]]=$I;return($B!=""?$H[$B]:$H);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$H=array();$wa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment".(min_version(10)?", a.attidentity":"")."
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$I){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$I["full_type"],$A);list(,$T,$Cd,$I["length"],$sa,$ya)=$A;$I["length"].=$ya;$Ta=$T.$sa;if(isset($wa[$Ta])){$I["type"]=$wa[$Ta];$I["full_type"]=$I["type"].$Cd.$ya;}else{$I["type"]=$T;$I["full_type"]=$I["type"].$Cd.$sa.$ya;}if(in_array($I['attidentity'],array('a','d')))$I['default']='GENERATED '.($I['attidentity']=='d'?'BY DEFAULT':'ALWAYS').' AS IDENTITY';$I["null"]=!$I["attnotnull"];$I["auto_increment"]=$I['attidentity']||preg_match('~^nextval\(~i',$I["default"]);$I["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^,)]+(.*)~',$I["default"],$A))$I["default"]=($A[1]=="NULL"?null:idf_unescape($A[1]).$A[2]);$H[$I["field"]]=$I;}return$H;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$H=array();$bg=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $bg AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption, (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $bg AND ci.oid = i.indexrelid",$i)as$I){$ff=$I["relname"];$H[$ff]["type"]=($I["indispartial"]?"INDEX":($I["indisprimary"]?"PRIMARY":($I["indisunique"]?"UNIQUE":"INDEX")));$H[$ff]["columns"]=array();foreach(explode(" ",$I["indkey"])as$gd)$H[$ff]["columns"][]=$f[$gd];$H[$ff]["descs"]=array();foreach(explode(" ",$I["indoption"])as$hd)$H[$ff]["descs"][]=($hd&1?'1':null);$H[$ff]["lengths"]=array();}return$H;}function
foreign_keys($Q){global$ke;$H=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$I){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$I['definition'],$A)){$I['source']=array_map('idf_unescape',array_map('trim',explode(',',$A[1])));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$Md)){$I['ns']=idf_unescape($Md[2]);$I['table']=idf_unescape($Md[4]);}$I['target']=array_map('idf_unescape',array_map('trim',explode(',',$A[3])));$I['on_delete']=(preg_match("~ON DELETE ($ke)~",$A[4],$Md)?$Md[1]:'NO ACTION');$I['on_update']=(preg_match("~ON UPDATE ($ke)~",$A[4],$Md)?$Md[1]:'NO ACTION');$H[$I['conname']]=$I;}}return$H;}function
constraints($Q){global$ke;$H=array();foreach(get_rows("SELECT conname, consrc
FROM pg_catalog.pg_constraint
INNER JOIN pg_catalog.pg_namespace ON pg_constraint.connamespace = pg_namespace.oid
INNER JOIN pg_catalog.pg_class ON pg_constraint.conrelid = pg_class.oid AND pg_constraint.connamespace = pg_class.relnamespace
WHERE pg_constraint.contype = 'c'
AND conrelid != 0 -- handle only CONSTRAINTs here, not TYPES
AND nspname = current_schema()
AND relname = ".q($Q)."
ORDER BY connamespace, conname")as$I)$H[$I['conname']]=$I['consrc'];return$H;}function
view($B){global$h;return
array("select"=>trim($h->result("SELECT pg_get_viewdef(".$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($B)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$h;$H=h($h->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$H,$A))$H=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\1<b>\2</b>',$A[2]).$A[4];return
nl_br($H);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$h;$h->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($B,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($B));}function
auto_increment(){return"";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){$c=array();$Xe=array();if($Q!=""&&$Q!=$B)$Xe[]="ALTER TABLE ".table($Q)." RENAME TO ".table($B);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Qg=$X[5];unset($X[5]);if($o[0]==""){if(isset($X[6]))$X[1]=($X[1]==" bigint"?" big":($X[1]==" smallint"?" small":" "))."serial";$c[]=($Q!=""?"ADD ":"  ").implode($X);if(isset($X[6]))$c[]=($Q!=""?"ADD":" ")." PRIMARY KEY ($X[0])";}else{if($e!=$X[0])$Xe[]="ALTER TABLE ".table($B)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Qg!="")$Xe[]="COMMENT ON COLUMN ".table($B).".$X[0] IS ".($Qg!=""?substr($Qg,9):"''");}}$c=array_merge($c,$_c);if($Q=="")array_unshift($Xe,"CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Xe,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""||$gb!="")$Xe[]="COMMENT ON TABLE ".table($B)." IS ".q($gb);if($Ea!=""){}foreach($Xe
as$F){if(!queries($F))return
false;}return
true;}function
alter_indexes($Q,$c){$ub=array();$Nb=array();$Xe=array();foreach($c
as$X){if($X[0]!="INDEX")$ub[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Nb[]=idf_escape($X[1]);else$Xe[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($ub)array_unshift($Xe,"ALTER TABLE ".table($Q).implode(",",$ub));if($Nb)array_unshift($Xe,"DROP INDEX ".implode(", ",$Nb));foreach($Xe
as$F){if(!queries($F))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($Vg){return
drop_tables($Vg);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$Vg,$dg){foreach(array_merge($S,$Vg)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($dg)))return
false;}return
true;}function
trigger($B,$Q){if($B=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$f=array();$Z="WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q)." AND trigger_name = ".q($B);foreach(get_rows("SELECT * FROM information_schema.triggered_update_columns $Z")as$I)$f[]=$I["event_object_column"];$H=array();foreach(get_rows('SELECT trigger_name AS "Trigger", action_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers '."$Z ORDER BY event_manipulation DESC")as$I){if($f&&$I["Event"]=="UPDATE")$I["Event"].=" OF";$I["Of"]=implode(", ",$f);if($H)$I["Event"].=" OR $H[Event]";$H=$I;}return$H;}function
triggers($Q){$H=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q))as$I){$zg=trigger($I["trigger_name"],$Q);$H[$zg["Trigger"]]=array($zg["Timing"],$zg["Event"]);}return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE","INSERT OR UPDATE","INSERT OR UPDATE OF","DELETE OR INSERT","DELETE OR UPDATE","DELETE OR UPDATE OF","DELETE OR INSERT OR UPDATE","DELETE OR INSERT OR UPDATE OF"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($B,$T){$J=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($B));$H=$J[0];$H["returns"]=array("type"=>$H["type_udt_name"]);$H["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($B).'
ORDER BY ordinal_position');return$H;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($B,$I){$H=array();foreach($I["fields"]as$o)$H[]=$o["type"];return
idf_escape($B)."(".implode(", ",$H).")";}function
last_id(){return
0;}function
explain($h,$F){return$h->query("EXPLAIN $F");}function
found_rows($R,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$ef))return$ef[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($sf,$i=null){global$h,$U,$Tf;if(!$i)$i=$h;$H=$i->query("SET search_path TO ".idf_escape($sf));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Tf[lang(26)][]=$T;}}return$H;}function
foreign_keys_sql($Q){$H="";$O=table_status($Q);$xc=foreign_keys($Q);ksort($xc);foreach($xc
as$wc=>$vc)$H.="ALTER TABLE ONLY ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." ADD CONSTRAINT ".idf_escape($wc)." $vc[definition] ".($vc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE').";\n";return($H?"$H\n":$H);}function
create_sql($Q,$Ea,$Uf){global$h;$H='';$of=array();$Af=array();$O=table_status($Q);if(is_view($O)){$Ug=view($Q);return
rtrim("CREATE VIEW ".idf_escape($Q)." AS $Ug[select]",";");}$p=fields($Q);$w=indexes($Q);ksort($w);$pb=constraints($Q);if(!$O||empty($p))return
false;$H="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($p
as$pc=>$o){$De=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$of[]=$De;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Nd)){$_f=$Nd[1];$Mf=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($_f):"SELECT * FROM $_f"));$Af[]=($Uf=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $_f;\n":"")."CREATE SEQUENCE $_f INCREMENT $Mf[increment_by] MINVALUE $Mf[min_value] MAXVALUE $Mf[max_value]".($Ea&&$Mf['last_value']?" START $Mf[last_value]":"")." CACHE $Mf[cache_value];";}}if(!empty($Af))$H=implode("\n\n",$Af)."\n\n$H";foreach($w
as$bd=>$v){switch($v['type']){case'UNIQUE':$of[]="CONSTRAINT ".idf_escape($bd)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$of[]="CONSTRAINT ".idf_escape($bd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($pb
as$lb=>$nb)$of[]="CONSTRAINT ".idf_escape($lb)." CHECK $nb";$H.=implode(",\n    ",$of)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($w
as$bd=>$v){if($v['type']=='INDEX'){$f=array();foreach($v['columns']as$y=>$X)$f[]=idf_escape($X).($v['descs'][$y]?" DESC":"");$H.="\n\nCREATE INDEX ".idf_escape($bd)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',$f).");";}}if($O['Comment'])$H.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($p
as$pc=>$o){if($o['comment'])$H.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($pc)." IS ".q($o['comment']).";";}return
rtrim($H,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$O=table_status($Q);$H="";foreach(triggers($Q)as$yg=>$xg){$zg=trigger($yg,$O['Name']);$H.="\nCREATE TRIGGER ".idf_escape($zg['Trigger'])." $zg[Timing] $zg[Event] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $zg[Type] $zg[Statement];;\n";}return$H;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$oc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(28)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(25)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(29)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(30)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(31)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("PgSQL","PDO_PgSQL"),'jush'=>"pgsql",'types'=>$U,'structured_types'=>$Tf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("char_length","lower","round","to_hex","to_timestamp","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",)),);}}$Mb["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;var$_current_db;function
_error($bc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){$this->_link=@oci_new_connect($V,$E,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){$this->_current_db=$j;return
true;}function
query($F,$Dg=false){$G=oci_parse($this->_link,$F);$this->error="";if(!$G){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$H=@oci_execute($G);restore_error_handler();if($H){if(oci_num_fields($G))return
new
Min_Result($G);$this->affected_rows=oci_num_rows($G);oci_free_statement($G);}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=1){$G=$this->query($F);if(!is_object($G)||!oci_fetch($G->_result))return
false;return
oci_result($G->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'OCI-Lob'))$I[$y]=$X->load();}return$I;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;$H->name=oci_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=oci_field_type($this->_result,$e);$H->charsetnr=(preg_match("~raw|blob|bfile~",$H->type)?63:0);return$H;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";var$_current_db;function
connect($M,$V,$E){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$E);return
true;}function
select_db($j){$this->_current_db=$j;return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}function
insertUpdate($Q,$J,$Pe){global$h;foreach($J
as$N){$Kg=array();$Z=array();foreach($N
as$y=>$X){$Kg[]="$y = $X";if(isset($Pe[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Kg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces ORDER BY 1");}function
limit($F,$Z,$z,$he=0,$L=" "){return($he?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $F$Z) t WHERE rownum <= ".($z+$he).") WHERE rnum > $he":($z!==null?" * FROM (SELECT $F$Z) WHERE rownum <= ".($z+$he):" $F$Z"));}function
limit1($Q,$F,$Z,$L="\n"){return" $F$Z";}function
db_collation($l,$bb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
get_current_db(){global$h;$l=$h->_current_db?$h->_current_db:DB;unset($h->_current_db);return$l;}function
where_owner($Oe,$ze="owner"){if(!$_GET["ns"])return'';return"$Oe$ze = sys_context('USERENV', 'CURRENT_SCHEMA')";}function
views_table($f){$ze=where_owner('');return"(SELECT $f FROM all_views WHERE ".($ze?$ze:"rownum < 0").")";}function
tables_list(){$Ug=views_table("view_name");$ze=where_owner(" AND ");return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."$ze
UNION SELECT view_name, 'view' FROM $Ug
ORDER BY 1");}function
count_tables($k){global$h;$H=array();foreach($k
as$l)$H[$l]=$h->result("SELECT COUNT(*) FROM all_tables WHERE tablespace_name = ".q($l));return$H;}function
table_status($B=""){$H=array();$uf=q($B);$l=get_current_db();$Ug=views_table("view_name");$ze=where_owner(" AND ");foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q($l).$ze.($B!=""?" AND table_name = $uf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM $Ug".($B!=""?" WHERE view_name = $uf":"")."
ORDER BY 1")as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$H=array();$ze=where_owner(" AND ");foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)."$ze ORDER BY column_id")as$I){$T=$I["DATA_TYPE"];$Cd="$I[DATA_PRECISION],$I[DATA_SCALE]";if($Cd==",")$Cd=$I["CHAR_COL_DECL_LENGTH"];$H[$I["COLUMN_NAME"]]=array("field"=>$I["COLUMN_NAME"],"full_type"=>$T.($Cd?"($Cd)":""),"type"=>strtolower($T),"length"=>$Cd,"default"=>$I["DATA_DEFAULT"],"null"=>($I["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$H;}function
indexes($Q,$i=null){$H=array();$ze=where_owner(" AND ","aic.table_owner");foreach(get_rows("SELECT aic.*, ac.constraint_type, atc.data_default
FROM all_ind_columns aic
LEFT JOIN all_constraints ac ON aic.index_name = ac.constraint_name AND aic.table_name = ac.table_name AND aic.index_owner = ac.owner
LEFT JOIN all_tab_cols atc ON aic.column_name = atc.column_name AND aic.table_name = atc.table_name AND aic.index_owner = atc.owner
WHERE aic.table_name = ".q($Q)."$ze
ORDER BY ac.constraint_type, aic.column_position",$i)as$I){$bd=$I["INDEX_NAME"];$eb=$I["DATA_DEFAULT"];$eb=($eb?trim($eb,'"'):$I["COLUMN_NAME"]);$H[$bd]["type"]=($I["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($I["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$H[$bd]["columns"][]=$eb;$H[$bd]["lengths"][]=($I["CHAR_LENGTH"]&&$I["CHAR_LENGTH"]!=$I["COLUMN_LENGTH"]?$I["CHAR_LENGTH"]:null);$H[$bd]["descs"][]=($I["DESCEND"]&&$I["DESCEND"]=="DESC"?'1':null);}return$H;}function
view($B){$Ug=views_table("view_name, text");$J=get_rows('SELECT text "select" FROM '.$Ug.' WHERE view_name = '.q($B));return
reset($J);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$F){$h->query("EXPLAIN PLAN FOR $F");return$h->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
auto_increment(){return"";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){$c=$Nb=array();$ve=($Q?fields($Q):array());foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");$ue=$ve[$o[0]];if($X&&$ue){$je=process_field($ue,$ue);if($X[2]==$je[2])$X[2]="";}if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$Nb[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$Nb||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$Nb).")"))&&($Q==$B||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)));}function
alter_indexes($Q,$c){$Nb=array();$Xe=array();foreach($c
as$X){if($X[0]!="INDEX"){$X[2]=preg_replace('~ DESC$~','',$X[2]);$ub=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");array_unshift($Xe,"ALTER TABLE ".table($Q).$ub);}elseif($X[2]=="DROP")$Nb[]=idf_escape($X[1]);else$Xe[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($Nb)array_unshift($Xe,"DROP INDEX ".implode(", ",$Nb));foreach($Xe
as$F){if(!queries($F))return
false;}return
true;}function
foreign_keys($Q){$H=array();$F="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($F)as$I)$H[$I['NAME']]=array("db"=>$I['DEST_DB'],"table"=>$I['DEST_TABLE'],"source"=>array($I['SRC_COLUMN']),"target"=>array($I['DEST_COLUMN']),"on_delete"=>$I['ON_DELETE'],"on_update"=>null,);return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Vg){return
apply_queries("DROP VIEW",$Vg);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){$H=get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX')) ORDER BY 1");return($H?$H:get_vals("SELECT DISTINCT owner FROM all_tables WHERE tablespace_name = ".q(DB)." ORDER BY 1"));}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($tf,$i=null){global$h;if(!$i)$i=$h;return$i->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($tf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$J=get_rows('SELECT * FROM v$instance');return
reset($J);}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view)$~',$oc);}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(28)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(25)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(29)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("OCI8","PDO_OCI"),'jush'=>"oracle",'types'=>$U,'structured_types'=>$Tf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("length","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",)),);}}$Mb["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$E){global$b;$l=$b->database();$mb=array("UID"=>$V,"PWD"=>$E,"CharacterSet"=>"UTF-8");if($l!="")$mb["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$M),$mb);if($this->_link){$id=sqlsrv_server_info($this->_link);$this->server_info=$id['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Dg=false){$G=sqlsrv_query($this->_link,$F);$this->error="";if(!$G){$this->_get_error();return
false;}return$this->store_result($G);}function
multi_query($F){$this->_result=sqlsrv_query($this->_link,$F);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($G=null){if(!$G)$G=$this->_result;if(!$G)return
false;if(sqlsrv_field_metadata($G))return
new
Min_Result($G);$this->affected_rows=sqlsrv_rows_affected($G);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->fetch_row();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'DateTime'))$I[$y]=$X->format("Y-m-d H:i:s");}return$I;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$H=new
stdClass;$H->name=$o["Name"];$H->orgname=$o["Name"];$H->type=($o["Type"]==1?254:0);return$H;}function
seek($he){for($s=0;$s<$he;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$E){$this->_link=@mssql_connect($M,$V,$E);if($this->_link){$G=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($G){$I=$G->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$I[0]] $I[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($F,$Dg=false){$G=@mssql_query($F,$this->_link);$this->error="";if(!$G){$this->error=mssql_get_last_message();return
false;}if($G===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;return
mssql_result($G->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=mssql_num_rows($G);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$H=mssql_fetch_field($this->_result);$H->orgtable=$H->table;$H->orgname=$H->name;return$H;}function
seek($he){mssql_data_seek($this->_result,$he);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$E){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Pe){foreach($J
as$N){$Kg=array();$Z=array();foreach($N
as$y=>$X){$Kg[]="$y = $X";if(isset($Pe[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Kg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($F,$Z,$z,$he=0,$L=" "){return($z!==null?" TOP (".($z+$he).")":"")." $F$Z";}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$bb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$h;$H=array();foreach($k
as$l){$h->select_db($l);$H[$l]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$H;}function
table_status($B=""){$H=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$hb=get_key_vals("SELECT objname, cast(value as varchar(max)) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$H=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$I){$T=$I["type"];$Cd=(preg_match("~char|binary~",$T)?$I["max_length"]:($T=="decimal"?"$I[precision],$I[scale]":""));$H[$I["name"]]=array("field"=>$I["name"],"full_type"=>$T.($Cd?"($Cd)":""),"type"=>$T,"length"=>$Cd,"default"=>$I["default"],"null"=>$I["is_nullable"],"auto_increment"=>$I["is_identity"],"collation"=>$I["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$I["is_identity"],"comment"=>$hb[$I["name"]],);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$i)as$I){$B=$I["name"];$H[$B]["type"]=($I["is_primary_key"]?"PRIMARY":($I["is_unique"]?"UNIQUE":"INDEX"));$H[$B]["lengths"]=array();$H[$B]["columns"][$I["key_ordinal"]]=$I["column_name"];$H[$B]["descs"][$I["key_ordinal"]]=($I["is_descending_key"]?'1':null);}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($B))));}function
collations(){$H=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$H[preg_replace('~_.*~','',$d)][]=$d;return$H;}function
information_schema($l){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$h->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($B,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($B));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){$c=array();$hb=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$hb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($_c[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($B)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$B)queries("EXEC sp_rename ".q(table($Q)).", ".q($B));if($_c)$c[""]=$_c;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($B)." $y".implode(",",$X)))return
false;}foreach($hb
as$y=>$X){$gb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$gb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));}return
true;}function
alter_indexes($Q,$c){$v=array();$Nb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Nb[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$Nb||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$Nb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$F){$h->query("SET SHOWPLAN_ALL ON");$H=$h->query($F);$h->query("SET SHOWPLAN_ALL OFF");return$H;}function
found_rows($R,$Z){}function
foreign_keys($Q){$H=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$I){$Cc=&$H[$I["FK_NAME"]];$Cc["db"]=$I["PKTABLE_QUALIFIER"];$Cc["table"]=$I["PKTABLE_NAME"];$Cc["source"][]=$I["FKCOLUMN_NAME"];$Cc["target"][]=$I["PKCOLUMN_NAME"];}return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Vg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Vg)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Vg,$dg){return
apply_queries("ALTER SCHEMA ".idf_escape($dg)." TRANSFER",array_merge($S,$Vg));}function
trigger($B){if($B=="")return
array();$J=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($B));$H=reset($J);if($H)$H["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$H["text"]);return$H;}function
triggers($Q){$H=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$I)$H[$I["name"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($sf){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$oc);}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(28)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(25)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(29)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("SQLSRV","MSSQL","PDO_DBLIB"),'jush'=>"mssql",'types'=>$U,'structured_types'=>$Tf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("len","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",)),);}}$Mb["mongo"]="MongoDB (alpha)";if(isset($_GET["mongo"])){define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Lg,$C){try{$this->_link=new
MongoClient($Lg,$C);if($C["password"]!=""){$C["password"]="";try{new
MongoClient($Lg,$C);$this->error=lang(22);}catch(Exception$Qb){}}}catch(Exception$Qb){$this->error=$Qb->getMessage();}}function
query($F){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$ec){$this->error=$ec->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$rd){$I=array();foreach($rd
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoId')?"ObjectId(\"$X\")":(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?"$X":(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$ud=array_keys($this->_rows[0]);$B=$ud[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Pe="_id";function
select($Q,$K,$Z,$Jc,$se=array(),$z=1,$D=0,$Re=false){$K=($K==array("*")?array():array_fill_keys($K,true));$Jf=array();foreach($se
as$X){$X=preg_replace('~ DESC$~','',$X,1,$sb);$Jf[$X]=($sb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$K)->sort($Jf)->limit($z!=""?+$z:0)->skip($D*$z));}function
insert($Q,$N){try{$H=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$H['code'];$this->_conn->error=$H['err'];$this->_conn->last_id=$N['_id'];return!$H['err'];}catch(Exception$ec){$this->_conn->error=$ec->getMessage();return
false;}}}function
get_databases($yc){global$h;$H=array();$Bb=$h->_link->listDBs();foreach($Bb['databases']as$l)$H[]=$l['name'];return$H;}function
count_tables($k){global$h;$H=array();foreach($k
as$l)$H[$l]=count($h->_link->selectDB($l)->getCollectionNames(true));return$H;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$h;foreach($k
as$l){$kf=$h->_link->selectDB($l)->drop();if(!$kf['ok'])return
false;}return
true;}function
indexes($Q,$i=null){global$h;$H=array();foreach($h->_db->selectCollection($Q)->getIndexInfo()as$v){$Hb=array();foreach($v["key"]as$e=>$T)$Hb[]=($T==-1?'1':null);$H[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Hb,);}return$H;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$pe=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$affected_rows,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Lg,$C){$Xa='MongoDB\Driver\Manager';$this->_link=new$Xa($Lg,$C);$this->executeCommand('admin',array('ping'=>1));}function
executeCommand($l,$fb){$Xa='MongoDB\Driver\Command';try{return$this->_link->executeCommand($l,new$Xa($fb));}catch(Exception$Qb){$this->error=$Qb->getMessage();return
array();}}function
executeBulkWrite($be,$Qa,$tb){try{$nf=$this->_link->executeBulkWrite($be,$Qa);$this->affected_rows=$nf->$tb();return
true;}catch(Exception$Qb){$this->error=$Qb->getMessage();return
false;}}function
query($F){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$rd){$I=array();foreach($rd
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'."$X\")":(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->getData():(is_a($X,'MongoDB\BSON\Regex')?"$X":(is_object($X)||is_array($X)?json_encode($X,256):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$ud=array_keys($this->_rows[0]);$B=$ud[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Pe="_id";function
select($Q,$K,$Z,$Jc,$se=array(),$z=1,$D=0,$Re=false){global$h;$K=($K==array("*")?array():array_fill_keys($K,1));if(count($K)&&!isset($K['_id']))$K['_id']=0;$Z=where_to_query($Z);$Jf=array();foreach($se
as$X){$X=preg_replace('~ DESC$~','',$X,1,$sb);$Jf[$X]=($sb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$Gf=$D*$z;$Xa='MongoDB\Driver\Query';try{return
new
Min_Result($h->_link->executeQuery("$h->_db_name.$Q",new$Xa($Z,array('projection'=>$K,'limit'=>$z,'skip'=>$Gf,'sort'=>$Jf))));}catch(Exception$Qb){$h->error=$Qb->getMessage();return
false;}}function
update($Q,$N,$Ye,$z=0,$L="\n"){global$h;$l=$h->_db_name;$Z=sql_query_where_parser($Ye);$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());if(isset($N['_id']))unset($N['_id']);$gf=array();foreach($N
as$y=>$Y){if($Y=='NULL'){$gf[$y]=1;unset($N[$y]);}}$Kg=array('$set'=>$N);if(count($gf))$Kg['$unset']=$gf;$Qa->update($Z,$Kg,array('upsert'=>false));return$h->executeBulkWrite("$l.$Q",$Qa,'getModifiedCount');}function
delete($Q,$Ye,$z=0){global$h;$l=$h->_db_name;$Z=sql_query_where_parser($Ye);$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());$Qa->delete($Z,array('limit'=>$z));return$h->executeBulkWrite("$l.$Q",$Qa,'getDeletedCount');}function
insert($Q,$N){global$h;$l=$h->_db_name;$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());if($N['_id']=='')unset($N['_id']);$Qa->insert($N);return$h->executeBulkWrite("$l.$Q",$Qa,'getInsertedCount');}}function
get_databases($yc){global$h;$H=array();foreach($h->executeCommand('admin',array('listDatabases'=>1))as$Bb){foreach($Bb->databases
as$l)$H[]=$l->name;}return$H;}function
count_tables($k){$H=array();return$H;}function
tables_list(){global$h;$cb=array();foreach($h->executeCommand($h->_db_name,array('listCollections'=>1))as$G)$cb[$G->name]='table';return$cb;}function
drop_databases($k){return
false;}function
indexes($Q,$i=null){global$h;$H=array();foreach($h->executeCommand($h->_db_name,array('listIndexes'=>$Q))as$v){$Hb=array();$f=array();foreach(get_object_vars($v->key)as$e=>$T){$Hb[]=($T==-1?'1':null);$f[]=$e;}$H[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Hb,);}return$H;}function
fields($Q){global$m;$p=fields_from_edit();if(!$p){$G=$m->select($Q,array("*"),null,null,array(),10);if($G){while($I=$G->fetch_assoc()){foreach($I
as$y=>$X){$I[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}}return$p;}function
found_rows($R,$Z){global$h;$Z=where_to_query($Z);$rg=$h->executeCommand($h->_db_name,array('count'=>$R['Name'],'query'=>$Z))->toArray();return$rg[0]->n;}function
sql_query_where_parser($Ye){$Ye=preg_replace('~^\sWHERE \(?\(?(.+?)\)?\)?$~','\1',$Ye);$dh=explode(' AND ',$Ye);$eh=explode(') OR (',$Ye);$Z=array();foreach($dh
as$bh)$Z[]=trim($bh);if(count($eh)==1)$eh=array();elseif(count($eh)>1)$Z=array();return
where_to_query($Z,$eh);}function
where_to_query($Zg=array(),$ah=array()){global$b;$_b=array();foreach(array('and'=>$Zg,'or'=>$ah)as$T=>$Z){if(is_array($Z)){foreach($Z
as$hc){list($ab,$ne,$X)=explode(" ",$hc,3);if($ab=="_id"&&preg_match('~^(MongoDB\\\\BSON\\\\ObjectID)\("(.+)"\)$~',$X,$A)){list(,$Xa,$X)=$A;$X=new$Xa($X);}if(!in_array($ne,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$ne,$A)){$X=(float)$X;$ne=$A[1];}elseif(preg_match('~^\(date\)(.+)~',$ne,$A)){$Ab=new
DateTime($X);$Xa='MongoDB\BSON\UTCDatetime';$X=new$Xa($Ab->getTimestamp()*1000);$ne=$A[1];}switch($ne){case'=':$ne='$eq';break;case'!=':$ne='$ne';break;case'>':$ne='$gt';break;case'<':$ne='$lt';break;case'>=':$ne='$gte';break;case'<=':$ne='$lte';break;case'regex':$ne='$regex';break;default:continue
2;}if($T=='and')$_b['$and'][]=array($ab=>array($ne=>$X));elseif($T=='or')$_b['$or'][]=array($ab=>array($ne=>$X));}}}return$_b;}$pe=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($B="",$nc=false){$H=array();foreach(tables_list()as$Q=>$T){$H[$Q]=array("Name"=>$Q);if($B==$Q)return$H[$Q];}return$H;}function
create_database($l,$d){return
true;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$wb=$b->credentials();return$wb[1];}function
connect(){global$b;$h=new
Min_DB;list($M,$V,$E)=$b->credentials();$C=array();if($V.$E!=""){$C["username"]=$V;$C["password"]=$E;}$l=$b->database();if($l!="")$C["db"]=$l;if(($Da=getenv("MONGO_AUTH_SOURCE")))$C["authSource"]=$Da;$h->connect("mongodb://$M",$C);if($h->error)return$h->error;return$h;}function
alter_indexes($Q,$c){global$h;foreach($c
as$X){list($T,$B,$N)=$X;if($N=="DROP")$H=$h->_db->command(array("deleteIndexes"=>$Q,"index"=>$B));else{$f=array();foreach($N
as$e){$e=preg_replace('~ DESC$~','',$e,1,$sb);$f[$e]=($sb?-1:1);}$H=$h->_db->selectCollection($Q)->ensureIndex($f,array("unique"=>($T=="UNIQUE"),"name"=>$B,));}if($H['errmsg']){$h->error=$H['errmsg'];return
false;}}return
true;}function
support($oc){return
preg_match("~database|indexes|descidx~",$oc);}function
db_collation($l,$bb){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){global$h;if($Q==""){$h->_db->createCollection($B);return
true;}}function
drop_tables($S){global$h;foreach($S
as$Q){$kf=$h->_db->selectCollection($Q)->drop();if(!$kf['ok'])return
false;}return
true;}function
truncate_tables($S){global$h;foreach($S
as$Q){$kf=$h->_db->selectCollection($Q)->remove();if(!$kf['ok'])return
false;}return
true;}function
driver_config(){global$pe;return
array('possible_drivers'=>array("mongo","mongodb"),'jush'=>"mongo",'operators'=>$pe,'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),);}}$Mb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url,$_db;function
rootQuery($Ge,$qb=array(),$Vd='GET'){@ini_set('track_errors',1);$rc=@file_get_contents("$this->_url/".ltrim($Ge,'/'),false,stream_context_create(array('http'=>array('method'=>$Vd,'content'=>$qb===null?$qb:json_encode($qb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$rc){$this->error=$php_errormsg;return$rc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=lang(32)." $http_response_header[0]";return
false;}$H=json_decode($rc,true);if($H===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$ob=get_defined_constants(true);foreach($ob['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return$H;}function
query($Ge,$qb=array(),$Vd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Ge,'/'),$qb,$Vd);}function
connect($M,$V,$E){preg_match('~^(https?://)?(.*)~',$M,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$E@$A[2]";$H=$this->query('');if($H)$this->server_info=$H['version']['number'];return(bool)$H;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($J){$this->num_rows=count($J);$this->_rows=$J;reset($this->_rows);}function
fetch_assoc(){$H=current($this->_rows);next($this->_rows);return$H;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$K,$Z,$Jc,$se=array(),$z=1,$D=0,$Re=false){global$b;$_b=array();$F="$Q/_search";if($K!=array("*"))$_b["fields"]=$K;if($se){$Jf=array();foreach($se
as$ab){$ab=preg_replace('~ DESC$~','',$ab,1,$sb);$Jf[]=($sb?array($ab=>"desc"):$ab);}$_b["sort"]=$Jf;}if($z){$_b["size"]=+$z;if($D)$_b["from"]=($D*$z);}foreach($Z
as$X){list($ab,$ne,$X)=explode(" ",$X,3);if($ab=="_id")$_b["query"]["ids"]["values"][]=$X;elseif($ab.$X!=""){$fg=array("term"=>array(($ab!=""?$ab:"_all")=>$X));if($ne=="=")$_b["query"]["filtered"]["filter"]["and"][]=$fg;else$_b["query"]["filtered"]["query"]["bool"]["must"][]=$fg;}}if($_b["query"]&&!$_b["query"]["filtered"]["query"]&&!$_b["query"]["ids"])$_b["query"]["filtered"]["query"]=array("match_all"=>array());$Qf=microtime(true);$uf=$this->_conn->query($F,$_b);if($Re)echo$b->selectQuery("$F: ".json_encode($_b),$Qf,!$uf);if(!$uf)return
false;$H=array();foreach($uf['hits']['hits']as$Vc){$I=array();if($K==array("*"))$I["_id"]=$Vc["_id"];$p=$Vc['_source'];if($K!=array("*")){$p=array();foreach($K
as$y)$p[$y]=$Vc['fields'][$y];}foreach($p
as$y=>$X){if($_b["fields"])$X=$X[0];$I[$y]=(is_array($X)?json_encode($X):$X);}$H[]=$I;}return
new
Min_Result($H);}function
update($T,$cf,$Ye,$z=0,$L="\n"){$Fe=preg_split('~ *= *~',$Ye);if(count($Fe)==2){$t=trim($Fe[1]);$F="$T/$t";return$this->_conn->query($F,$cf,'POST');}return
false;}function
insert($T,$cf){$t="";$F="$T/$t";$kf=$this->_conn->query($F,$cf,'POST');$this->_conn->last_id=$kf['_id'];return$kf['created'];}function
delete($T,$Ye,$z=0){$Zc=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Zc[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Sa){$Fe=preg_split('~ *= *~',$Sa);if(count($Fe)==2)$Zc[]=trim($Fe[1]);}}$this->_conn->affected_rows=0;foreach($Zc
as$t){$F="{$T}/{$t}";$kf=$this->_conn->query($F,'{}','DELETE');if(is_array($kf)&&$kf['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;list($M,$V,$E)=$b->credentials();if($E!=""&&$h->connect($M,$V,""))return
lang(22);if($h->connect($M,$V,$E))return$h;return$h->error;}function
support($oc){return
preg_match("~database|table|columns~",$oc);}function
logged_user(){global$b;$wb=$b->credentials();return$wb[1];}function
get_databases(){global$h;$H=$h->rootQuery('_aliases');if($H){$H=array_keys($H);sort($H,SORT_STRING);}return$H;}function
collations(){return
array();}function
db_collation($l,$bb){}function
engines(){return
array();}function
count_tables($k){global$h;$H=array();$G=$h->query('_stats');if($G&&$G['indices']){$fd=$G['indices'];foreach($fd
as$ed=>$Rf){$dd=$Rf['total']['indexing'];$H[$ed]=$dd['index_total'];}}return$H;}function
tables_list(){global$h;if(min_version(6))return
array('_doc'=>'table');$H=$h->query('_mapping');if($H)$H=array_fill_keys(array_keys($H[$h->_db]["mappings"]),'table');return$H;}function
table_status($B="",$nc=false){global$h;$uf=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$H=array();if($uf){$S=$uf["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$H[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($B!=""&&$B==$Q["key"])return$H[$B];}}return$H;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$h;$Jd=array();if(min_version(6)){$G=$h->query("_mapping");if($G)$Jd=$G[$h->_db]['mappings']['properties'];}else{$G=$h->query("$Q/_mapping");if($G){$Jd=$G[$Q]['properties'];if(!$Jd)$Jd=$G[$h->_db]['mappings'][$Q]['properties'];}}$H=array();if($Jd){foreach($Jd
as$B=>$o){$H[$B]=array("field"=>$B,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($H[$B]["privileges"]["insert"]);unset($H[$B]["privileges"]["update"]);}}}return$H;}function
foreign_keys($Q){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($l){global$h;return$h->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$h;return$h->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){global$h;$Ue=array();foreach($p
as$lc){$pc=trim($lc[1][0]);$qc=trim($lc[1][1]?$lc[1][1]:"text");$Ue[$pc]=array('type'=>$qc);}if(!empty($Ue))$Ue=array('properties'=>$Ue);return$h->query("_mapping/{$B}",$Ue,'PUT');}function
drop_tables($S){global$h;$H=true;foreach($S
as$Q)$H=$H&&$h->query(urlencode($Q),array(),'DELETE');return$H;}function
last_id(){global$h;return$h->last_id;}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(28)=>array("date"=>10),lang(25)=>array("string"=>65535,"text"=>65535),lang(29)=>array("binary"=>255),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("json + allow_url_fopen"),'jush'=>"elastic",'operators'=>array("=","query"),'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),'types'=>$U,'structured_types'=>$Tf,);}}class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".lang(33)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($ub=false){return
password_file($ub);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($M){}function
database(){global$h;if($h){$k=$this->databases(false);return(!$k?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$k[(information_schema($k[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($yc=true){return
get_databases($yc);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$H=array();$q="adminer.css";if(file_exists($q))$H[]=$q;return$H;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.lang(34).'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.lang(35).'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".lang(36)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(37))."\n";}function
loginFormField($B,$Tc,$Y){return$Tc.$Y;}function
login($Hd,$E){return
true;}function
tableName($Zf){return
h($Zf["Comment"]!=""?$Zf["Comment"]:$Zf["Name"]);}function
fieldName($o,$se=0){return
h(preg_replace('~\s+\[.*\]$~','',($o["comment"]!=""?$o["comment"]:$o["field"])));}function
selectLinks($Zf,$N=""){$a=$Zf["Name"];if($N!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$N).'">'.lang(38)."</a>\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Yf){$H=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($Q)."
ORDER BY ORDINAL_POSITION",null,"")as$I)$H[$I["TABLE_NAME"]]["keys"][$I["CONSTRAINT_NAME"]][$I["COLUMN_NAME"]]=$I["REFERENCED_COLUMN_NAME"];foreach($H
as$y=>$X){$B=$this->tableName(table_status($y,true));if($B!=""){$uf=preg_quote($Yf);$L="(:|\\s*-)?\\s+";$H[$y]["name"]=(preg_match("(^$uf$L(.+)|^(.+?)$L$uf\$)iu",$B,$A)?$A[2].$A[3]:$B);}else
unset($H[$y]);}return$H;}function
backwardKeysPrint($Ia,$I){foreach($Ia
as$Q=>$Ha){foreach($Ha["keys"]as$db){$_=ME.'select='.urlencode($Q);$s=0;foreach($db
as$e=>$X)$_.=where_link($s++,$e,$I[$X]);echo"<a href='".h($_)."'>".h($Ha["name"])."</a>";$_=ME.'edit='.urlencode($Q);foreach($db
as$e=>$X)$_.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($I[$X]);echo"<a href='".h($_)."' title='".lang(38)."'>+</a> ";}}}function
selectQuery($F,$Qf,$mc=false){return"<!--\n".str_replace("--","--><!-- ",$F)."\n(".format_time($Qf).")\n-->\n";}function
rowDescription($Q){foreach(fields($Q)as$o){if(preg_match("~varchar|character varying~",$o["type"]))return
idf_escape($o["field"]);}return"";}function
rowDescriptions($J,$Bc){$H=$J;foreach($J[0]as$y=>$X){if(list($Q,$t,$B)=$this->_foreignColumn($Bc,$y)){$Zc=array();foreach($J
as$I)$Zc[$I[$y]]=q($I[$y]);$Gb=$this->_values[$Q];if(!$Gb)$Gb=get_key_vals("SELECT $t, $B FROM ".table($Q)." WHERE $t IN (".implode(", ",$Zc).")");foreach($J
as$Zd=>$I){if(isset($I[$y]))$H[$Zd][$y]=(string)$Gb[$I[$y]];}}}return$H;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$we){$H=$X;$_=h($_);if(preg_match('~blob|bytea~',$o["type"])&&!is_utf8($X)){$H=lang(39,strlen($we));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$we))$H="<img src='$_' alt='$H'>";}if(like_bool($o)&&$H!="")$H=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?lang(40):lang(41));if($_)$H="<a href='$_'".(is_url($_)?target_blank():"").">$H</a>";if(!$_&&!like_bool($o)&&preg_match(number_type(),$o["type"]))$H="<div class='number'>$H</div>";elseif(preg_match('~date~',$o["type"]))$H="<div class='datetime'>$H</div>";return$H;}function
editVal($X,$o){if(preg_match('~date|timestamp~',$o["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~',lang(42),$X);return$X;}function
selectColumnsPrint($K,$f){}function
selectSearchPrint($Z,$f,$w){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(43)."</legend><div>\n";$ud=array();foreach($Z
as$y=>$X)$ud[$X["col"]]=$y;$s=0;$p=fields($_GET["select"]);foreach($f
as$B=>$Fb){$o=$p[$B];if(preg_match("~enum~",$o["type"])||like_bool($o)){$y=$ud[$B];$s--;echo"<div>".h($Fb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'>:",(like_bool($o)?" <select name='where[$s][val]'>".optionlist(array(""=>"",lang(41),lang(40)),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$o,(array)$Z[$y]["val"],($o["null"]?0:null))),"</div>\n";unset($f[$B]);}elseif(is_array($C=$this->_foreignKeyOptions($_GET["select"],$B))){if($p[$B]["null"])$C[0]='('.lang(7).')';$y=$ud[$B];$s--;echo"<div>".h($Fb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($C,$Z[$y]["val"],true)."</select></div>\n";unset($f[$B]);}}$s=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".lang(44).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$s++;}}echo"<div><select name='where[$s][col]'><option value=''>(".lang(44).")".optionlist($f,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($se,$f,$w){$te=array();foreach($w
as$y=>$v){$se=array();foreach($v["columns"]as$X)$se[]=$f[$X];if(count(array_filter($se,'strlen'))>1&&$y!="PRIMARY")$te[$y]=implode(", ",$se);}if($te){echo'<fieldset><legend>'.lang(45)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$te,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(46)."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($hg){}function
selectActionPrint($w){echo"<fieldset><legend>".lang(47)."</legend><div>","<input type='submit' value='".lang(48)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Vb,$f){if($Vb){print_fieldset("email",lang(49),$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".lang(50).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(51).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(52).": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Vb)==1?'<input type="hidden" name="email_field" value="'.h(key($Vb)).'">':html_select("email_field",$Vb)),"<input type='submit' name='email' value='".lang(53)."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$w){return
array(array(),array());}function
selectSearchProcess($p,$w){global$m;$H=array();foreach((array)$_GET["where"]as$y=>$Z){$ab=$Z["col"];$ne=$Z["op"];$X=$Z["val"];if(($y<0?"":$ab).$X!=""){$ib=array();foreach(($ab!=""?array($ab=>$p[$ab]):$p)as$B=>$o){if($ab!=""||is_numeric($X)||!preg_match(number_type(),$o["type"])){$B=idf_escape($B);if($ab!=""&&$o["type"]=="enum")$ib[]=(in_array(0,$X)?"$B IS NULL OR ":"")."$B IN (".implode(", ",array_map('intval',$X)).")";else{$ig=preg_match('~char|text|enum|set~',$o["type"]);$Y=$this->processInput($o,(!$ne&&$ig&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$ib[]=$m->convertSearch($B,$X,$o).($Y=="NULL"?" IS".($ne==">="?" NOT":"")." $Y":(in_array($ne,$this->operators)||$ne=="="?" $ne $Y":($ig?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($y<0&&$X=="0")$ib[]="$B IS NULL";}}}$H[]=($ib?"(".implode(" OR ",$ib).")":"1 = 0");}}return$H;}function
selectOrderProcess($p,$w){$cd=$_GET["index_order"];if($cd!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($cd!=""?array($w[$cd]):$w)as$v){if($cd!=""||$v["type"]=="INDEX"){$Oc=array_filter($v["descs"]);$Fb=false;foreach($v["columns"]as$X){if(preg_match('~date|timestamp~',$p[$X]["type"])){$Fb=true;break;}}$H=array();foreach($v["columns"]as$y=>$X)$H[]=idf_escape($X).(($Oc?$v["descs"][$y]:$Fb)?" DESC":"");return$H;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Bc){if($_POST["email_append"])return
true;if($_POST["email"]){$yf=0;if($_POST["all"]||$_POST["check"]){$o=idf_escape($_POST["email_field"]);$Vf=$_POST["email_subject"];$Td=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$Vf.$Td",$Nd);$J=get_rows("SELECT DISTINCT $o".($Nd[1]?", ".implode(", ",array_map('idf_escape',array_unique($Nd[1]))):"")." FROM ".table($_GET["select"])." WHERE $o IS NOT NULL AND $o != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$p=fields($_GET["select"]);foreach($this->rowDescriptions($J,$Bc)as$I){$if=array('{\\'=>'{');foreach($Nd[1]as$X)$if['{$'."$X}"]=$this->editVal($I[$X],$p[$X]);$Ub=$I[$_POST["email_field"]];if(is_mail($Ub)&&send_mail($Ub,strtr($Vf,$if),strtr($Td,$if),$_POST["email_from"],$_FILES["email_files"]))$yf++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(54,$yf));}return
false;}function
selectQueryBuild($K,$Z,$Jc,$se,$z,$D){return"";}function
messageQuery($F,$jg,$mc=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$F)."\n".($jg?"($jg)\n":"")."-->";}function
editRowPrint($Q,$p,$I,$Kg){}function
editFunctions($o){$H=array();if($o["null"]&&preg_match('~blob~',$o["type"]))$H["NULL"]=lang(7);$H[""]=($o["null"]||$o["auto_increment"]||like_bool($o)?"":"*");if(preg_match('~date|time~',$o["type"]))$H["now"]=lang(55);if(preg_match('~_(md5|sha1)$~i',$o["field"],$A))$H[]=strtolower($A[1]);return$H;}function
editInput($Q,$o,$Ba,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ba value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Ba,$o,($Y||isset($_GET["select"])?$Y:0),($o["null"]?"":null));$C=$this->_foreignKeyOptions($Q,$o["field"],$Y);if($C!==null)return(is_array($C)?"<select$Ba>".optionlist($C,$Y,true)."</select>":"<input value='".h($Y)."'$Ba class='hidden'>"."<input value='".h($C)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($Q)."&field=".urlencode($o["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($o))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Ba>";$Uc="";if(preg_match('~time~',$o["type"]))$Uc=lang(56);if(preg_match('~date|timestamp~',$o["type"]))$Uc=lang(57).($Uc?" [$Uc]":"");if($Uc)return"<input value='".h($Y)."'$Ba> ($Uc)";if(preg_match('~_(md5|sha1)$~i',$o["field"]))return"<input type='password' value='".h($Y)."'$Ba>";return'';}function
editHint($Q,$o,$Y){return(preg_match('~\s+(\[.*\])$~',($o["comment"]!=""?$o["comment"]:$o["field"]),$A)?h(" $A[1]"):'');}function
processInput($o,$Y,$r=""){if($r=="now")return"$r()";$H=$Y;if(preg_match('~date|timestamp~',$o["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote(lang(42)))).'(.*))',$Y,$A))$H=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$H=($o["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$H:q($H));if($Y==""&&like_bool($o))$H="'0'";elseif($Y==""&&($o["null"]||!preg_match('~char|text~',$o["type"])))$H="NULL";elseif(preg_match('~^(md5|sha1)$~',$r))$H="$r($H)";return
unconvert_field($o,$H);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($Q,$Uf,$qd=0){echo"\xef\xbb\xbf";}function
dumpData($Q,$Uf,$F){global$h;$G=$h->query($F,1);if($G){while($I=$G->fetch_assoc()){if($Uf=="table"){dump_csv(array_keys($I));$Uf="INSERT";}dump_csv($I);}}}function
dumpFilename($Yc){return
friendly_url($Yc);}function
dumpHeaders($Yc,$Xd=false){$ic="csv";header("Content-Type: text/csv; charset=utf-8");return$ic;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Wd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Wd=="auth"){$uc=true;foreach((array)$_SESSION["pwds"]as$Sg=>$Cf){foreach($Cf[""]as$V=>$E){if($E!==null){if($uc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$uc=false;}echo"<li><a href='".h(auth_url($Sg,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a>\n";}}}}else{$this->databasesPrint($Wd);if($Wd!="db"&&$Wd!="ns"){$R=table_status('',true);if(!$R)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($R);}}}function
databasesPrint($Wd){}function
tablesPrint($S){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$I){echo'<li>';$B=$this->tableName($I);if(isset($I["Engine"])&&$B!="")echo"<a href='".h(ME).'select='.urlencode($I["Name"])."'".bold($_GET["select"]==$I["Name"]||$_GET["edit"]==$I["Name"],"select")." title='".lang(58)."'>$B</a>\n";}echo"</ul>\n";}function
_foreignColumn($Bc,$e){foreach((array)$Bc[$e]as$Ac){if(count($Ac["source"])==1){$B=$this->rowDescription($Ac["table"]);if($B!=""){$t=idf_escape($Ac["target"][0]);return
array($Ac["table"],$t,$B);}}}}function
_foreignKeyOptions($Q,$e,$Y=null){global$h;if(list($dg,$t,$B)=$this->_foreignColumn(column_foreign_keys($Q),$e)){$H=&$this->_values[$dg];if($H===null){$R=table_status($dg);$H=($R["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $B FROM ".table($dg)." ORDER BY 2"));}if(!$H&&$Y!==null)return$h->result("SELECT $B FROM ".table($dg)." WHERE $t = ".q($Y));return$H;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);$Mb=array("server"=>"MySQL")+$Mb;if(!defined("DRIVER")){define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$E="",$j=null,$Le=null,$If=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Wc,$Le)=explode(":",$M,2);$Pf=$b->connectSsl();if($Pf)$this->ssl_set($Pf['key'],$Pf['cert'],$Pf['ca'],'','');$H=@$this->real_connect(($M!=""?$Wc:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$E!=""?$E:ini_get("mysqli.default_pw")),$j,(is_numeric($Le)?$Le:ini_get("mysqli.default_port")),(!is_numeric($Le)?$Le:$If),($Pf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$H;}function
set_charset($Ra){if(parent::set_charset($Ra))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Ra");}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch_array();return$I[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$E){if(ini_bool("mysql.allow_local_infile")){$this->error=lang(59,"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$E"!=""?$E:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ra){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Ra,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Ra");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($F,$Dg=false){$G=@($Dg?mysql_unbuffered_query($F,$this->_link):mysql_query($F,$this->_link));$this->error="";if(!$G){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($G===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
mysql_result($G->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($G){$this->_result=$G;$this->num_rows=mysql_num_rows($G);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$H=mysql_fetch_field($this->_result,$this->_offset++);$H->orgtable=$H->table;$H->orgname=$H->name;$H->charsetnr=($H->blob?63:0);return$H;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$E){global$b;$C=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Pf=$b->connectSsl();if($Pf){if(!empty($Pf['key']))$C[PDO::MYSQL_ATTR_SSL_KEY]=$Pf['key'];if(!empty($Pf['cert']))$C[PDO::MYSQL_ATTR_SSL_CERT]=$Pf['cert'];if(!empty($Pf['ca']))$C[PDO::MYSQL_ATTR_SSL_CA]=$Pf['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E,$C);return
true;}function
set_charset($Ra){$this->query("SET NAMES $Ra");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Dg=false){$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,!$Dg);return
parent::query($F,$Dg);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$J,$Pe){$f=array_keys(reset($J));$Oe="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Rg=array();foreach($f
as$y)$Rg[$y]="$y = VALUES($y)";$Wf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Rg);$Rg=array();$Cd=0;foreach($J
as$N){$Y="(".implode(", ",$N).")";if($Rg&&(strlen($Oe)+$Cd+strlen($Y)+strlen($Wf)>1e6)){if(!queries($Oe.implode(",\n",$Rg).$Wf))return
false;$Rg=array();$Cd=0;}$Rg[]=$Y;$Cd+=strlen($Y)+2;}return
queries($Oe.implode(",\n",$Rg).$Wf);}function
slowQuery($F,$kg){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$kg FOR $F";elseif(preg_match('~^(SELECT\b)(.+)~is',$F,$A))return"$A[1] /*+ MAX_EXECUTION_TIME(".($kg*1000).") */ $A[2]";}}function
convertSearch($u,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$G=$this->_conn->query("SHOW WARNINGS");if($G&&$G->num_rows){ob_start();select($G);return
ob_get_clean();}}function
tableHelp($B){$Kd=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Kd?"information-schema-$B-table/":str_replace("_","-",$B)."-table.html"));if(DB=="mysql")return($Kd?"mysql$B-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Tf;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$Tf[lang(25)][]="json";$U["json"]=4294967295;}return$h;}$H=$h->error;if(function_exists('iconv')&&!is_utf8($H)&&strlen($rf=iconv("windows-1250","utf-8",$H))>strlen($H))$H=$rf;return$H;}function
get_databases($yc){$H=get_session("dbs");if($H===null){$F=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$H=($yc?slow_query($F):get_vals($F));restart_session();set_session("dbs",$H);stop_session();}return$H;}function
limit($F,$Z,$z,$he=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($he?" OFFSET $he":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$bb){global$h;$H=null;$ub=$h->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$ub,$A))$H=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$ub,$A))$H=$bb[$A[1]][-1];return$H;}function
engines(){$H=array();foreach(get_rows("SHOW ENGINES")as$I){if(preg_match("~YES|DEFAULT~",$I["Support"]))$H[]=$I["Engine"];}return$H;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$H=array();foreach($k
as$l)$H[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$H;}function
table_status($B="",$nc=false){$H=array();foreach(get_rows($nc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($B!=""?"AND TABLE_NAME = ".q($B):"ORDER BY Name"):"SHOW TABLE STATUS".($B!=""?" LIKE ".q(addcslashes($B,"%_\\")):""))as$I){if($I["Engine"]=="InnoDB")$I["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$I["Comment"]);if(!isset($I["Engine"]))$I["Comment"]="";if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$H=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$I){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$I["Type"],$A);$H[$I["Field"]]=array("field"=>$I["Field"],"full_type"=>$I["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($I["Default"]!=""||preg_match("~char|set~",$A[1])?(preg_match('~text~',$A[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$I["Default"])):$I["Default"]):null),"null"=>($I["Null"]=="YES"),"auto_increment"=>($I["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$I["Extra"],$A)?$A[1]:""),"collation"=>$I["Collation"],"privileges"=>array_flip(preg_split('~, *~',$I["Privileges"])),"comment"=>$I["Comment"],"primary"=>($I["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$I["Extra"]),);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$i)as$I){$B=$I["Key_name"];$H[$B]["type"]=($B=="PRIMARY"?"PRIMARY":($I["Index_type"]=="FULLTEXT"?"FULLTEXT":($I["Non_unique"]?($I["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$H[$B]["columns"][]=$I["Column_name"];$H[$B]["lengths"][]=($I["Index_type"]=="SPATIAL"?null:$I["Sub_part"]);$H[$B]["descs"][]=null;}return$H;}function
foreign_keys($Q){global$h,$ke;static$He='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$H=array();$vb=$h->result("SHOW CREATE TABLE ".table($Q),1);if($vb){preg_match_all("~CONSTRAINT ($He) FOREIGN KEY ?\\(((?:$He,? ?)+)\\) REFERENCES ($He)(?:\\.($He))? \\(((?:$He,? ?)+)\\)(?: ON DELETE ($ke))?(?: ON UPDATE ($ke))?~",$vb,$Nd,PREG_SET_ORDER);foreach($Nd
as$A){preg_match_all("~$He~",$A[2],$Kf);preg_match_all("~$He~",$A[5],$dg);$H[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Kf[0]),"target"=>array_map('idf_unescape',$dg[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$h->result("SHOW CREATE VIEW ".table($B),1)));}function
collations(){$H=array();foreach(get_rows("SHOW COLLATION")as$I){if($I["Default"])$H[$I["Charset"]][-1]=$I["Collation"];else$H[$I["Charset"]][]=$I["Collation"];}ksort($H);foreach($H
as$y=>$X)asort($H[$y]);return$H;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$H=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$H;}function
rename_database($B,$d){$H=false;if(create_database($B,$d)){$S=array();$Vg=array();foreach(tables_list()as$Q=>$T){if($T=='VIEW')$Vg[]=$Q;else$S[]=$Q;}$H=(!$S&&!$Vg)||move_tables($S,$Vg,$B);drop_databases($H?array(DB):array());}return$H;}function
auto_increment(){$Fa=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Fa="";break;}if($v["type"]=="PRIMARY")$Fa=" UNIQUE";}}return" AUTO_INCREMENT$Fa";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$_c);$O=($gb!==null?" COMMENT=".q($gb):"").($Yb?" ENGINE=".q($Yb):"").($d?" COLLATE ".q($d):"").($Ea!=""?" AUTO_INCREMENT=$Ea":"");if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$O$Ee");if($Q!=$B)$c[]="RENAME TO ".table($B);if($O)$c[]=ltrim($O);return($c||$Ee?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Ee):true);}function
alter_indexes($Q,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Vg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Vg)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Vg,$dg){global$h;$hf=array();foreach($S
as$Q)$hf[]=table($Q)." TO ".idf_escape($dg).".".table($Q);if(!$hf||queries("RENAME TABLE ".implode(", ",$hf))){$Eb=array();foreach($Vg
as$Q)$Eb[table($Q)]=view($Q);$h->select_db($dg);$l=idf_escape(DB);foreach($Eb
as$B=>$Ug){if(!queries("CREATE VIEW $B AS ".str_replace(" $l."," ",$Ug["select"]))||!queries("DROP VIEW $l.$B"))return
false;}return
true;}return
false;}function
copy_tables($S,$Vg,$dg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$B=($dg==DB?table("copy_$Q"):idf_escape($dg).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $B"))||!queries("CREATE TABLE $B LIKE ".table($Q))||!queries("INSERT INTO $B SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I){$zg=$I["Trigger"];if(!queries("CREATE TRIGGER ".($dg==DB?idf_escape("copy_$zg"):idf_escape($dg).".".idf_escape($zg))." $I[Timing] $I[Event] ON $B FOR EACH ROW\n$I[Statement];"))return
false;}}foreach($Vg
as$Q){$B=($dg==DB?table("copy_$Q"):idf_escape($dg).".".table($Q));$Ug=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $B"))||!queries("CREATE VIEW $B AS $Ug[select]"))return
false;}return
true;}function
trigger($B){if($B=="")return
array();$J=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($B));return
reset($J);}function
triggers($Q){$H=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I)$H[$I["Trigger"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($B,$T){global$h,$Zb,$kd,$U;$wa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Lf="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Cg="((".implode("|",array_merge(array_keys($U),$wa)).")\\b(?:\\s*\\(((?:[^'\")]|$Zb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$He="$Lf*(".($T=="FUNCTION"?"":$kd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Cg";$ub=$h->result("SHOW CREATE $T ".idf_escape($B),2);preg_match("~\\(((?:$He\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$Cg\\s+":"")."(.*)~is",$ub,$A);$p=array();preg_match_all("~$He\\s*,?~is",$A[1],$Nd,PREG_SET_ORDER);foreach($Nd
as$Be)$p[]=array("field"=>str_replace("``","`",$Be[2]).$Be[3],"type"=>strtolower($Be[5]),"length"=>preg_replace_callback("~$Zb~s",'normalize_enum',$Be[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Be[8] $Be[7]"))),"null"=>1,"full_type"=>$Be[4],"inout"=>strtoupper($Be[1]),"collation"=>strtolower($Be[9]),);if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$A[11]);return
array("fields"=>$p,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($B,$I){return
idf_escape($B);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$F){return$h->query("EXPLAIN ".(min_version(5.1)&&!min_version(5.7)?"PARTITIONS ":"").$F);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($sf,$i=null){return
true;}function
create_sql($Q,$Ea,$Uf){global$h;$H=$h->result("SHOW CREATE TABLE ".table($Q),1);if(!$Ea)$H=preg_replace('~ AUTO_INCREMENT=\d+~','',$H);return$H;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($Q){$H="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$I)$H.="\nCREATE TRIGGER ".idf_escape($I["Trigger"])." $I[Timing] $I[Event] ON ".table($I["Table"])." FOR EACH ROW\n$I[Statement];;\n";return$H;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$H){if(preg_match("~binary~",$o["type"]))$H="UNHEX($H)";if($o["type"]=="bit")$H="CONV($H, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$H=(min_version(8)?"ST_":"")."GeomFromText($H, SRID($o[field]))";return$H;}function
support($oc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$oc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(28)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(25)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(60)=>array("enum"=>65535,"set"=>64),lang(29)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(31)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("MySQLi","MySQL","PDO_MySQL"),'jush'=>"sql",'types'=>$U,'structured_types'=>$Tf,'unsigned'=>array("unsigned","zerofill","unsigned zerofill"),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",)),);}}$jb=driver_config();$Ne=$jb['possible_drivers'];$x=$jb['jush'];$U=$jb['types'];$Tf=$jb['structured_types'];$Jg=$jb['unsigned'];$pe=$jb['operators'];$Ic=$jb['functions'];$Mc=$jb['grouping'];$Rb=$jb['edit_functions'];if($b->operators===null)$b->operators=$pe;define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.8.1";function
page_header($mg,$n="",$Pa=array(),$ng=""){global$ba,$ca,$b,$Mb,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$og=$mg.($ng!=""?": $ng":"");$pg=strip_tags($og.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(61),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$pg,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.8.1"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.8.1");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.1"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.1"),'">
';foreach($b->css()as$yb){echo'<link rel="stylesheet" type="text/css" href="',h($yb),'">
';}}echo'
<body class="',lang(61),' nojs">
';$q=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($q)&&filemtime($q)+86400>time()){$Tg=unserialize(file_get_contents($q));$Ve="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Tg["version"],base64_decode($Tg["signature"]),$Ve)==1)$_COOKIE["adminer_version"]=$Tg["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(62)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Pa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Mb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=$b->serverName(SERVER);$M=($M!=""?$M:lang(63));if($Pa===false)echo"$M\n";else{echo"<a href='".h($_)."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Pa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Pa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Pa
as$y=>$X){$Fb=(is_array($X)?$X[1]:h($X));if($Fb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Fb</a> &raquo; ";}}echo"$mg\n";}}echo"<h2>$og</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$xb){$Rc=array();foreach($xb
as$y=>$X)$Rc[]="$y $X";header("Content-Security-Policy: ".implode("; ",$Rc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$de;if(!$de)$de=base64_encode(rand_string());return$de;}function
page_messages($n){$Lg=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ud=$_SESSION["messages"][$Lg];if($Ud){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ud)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Lg]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Wd=""){global$b,$sg;echo'</div>

';switch_lang();if($Wd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(64),'" id="logout">
<input type="hidden" name="token" value="',$sg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Wd);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Zd){while($Zd>=2147483648)$Zd-=4294967296;while($Zd<=-2147483649)$Zd+=4294967296;return(int)$Zd;}function
long2str($W,$Xg){$rf='';foreach($W
as$X)$rf.=pack('V',$X);if($Xg)return
substr($rf,0,end($W));return$rf;}function
str2long($rf,$Xg){$W=array_values(unpack('V*',str_pad($rf,4*ceil(strlen($rf)/4),"\0")));if($Xg)$W[]=strlen($rf);return$W;}function
xxtea_mx($hh,$gh,$Xf,$sd){return
int32((($hh>>5&0x7FFFFFF)^$gh<<2)+(($gh>>3&0x1FFFFFFF)^$hh<<4))^int32(($Xf^$gh)+($sd^$hh));}function
encrypt_string($Sf,$y){if($Sf=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Sf,true);$Zd=count($W)-1;$hh=$W[$Zd];$gh=$W[0];$We=floor(6+52/($Zd+1));$Xf=0;while($We-->0){$Xf=int32($Xf+0x9E3779B9);$Qb=$Xf>>2&3;for($_e=0;$_e<$Zd;$_e++){$gh=$W[$_e+1];$Yd=xxtea_mx($hh,$gh,$Xf,$y[$_e&3^$Qb]);$hh=int32($W[$_e]+$Yd);$W[$_e]=$hh;}$gh=$W[0];$Yd=xxtea_mx($hh,$gh,$Xf,$y[$_e&3^$Qb]);$hh=int32($W[$Zd]+$Yd);$W[$Zd]=$hh;}return
long2str($W,false);}function
decrypt_string($Sf,$y){if($Sf=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Sf,false);$Zd=count($W)-1;$hh=$W[$Zd];$gh=$W[0];$We=floor(6+52/($Zd+1));$Xf=int32($We*0x9E3779B9);while($Xf){$Qb=$Xf>>2&3;for($_e=$Zd;$_e>0;$_e--){$hh=$W[$_e-1];$Yd=xxtea_mx($hh,$gh,$Xf,$y[$_e&3^$Qb]);$gh=int32($W[$_e]-$Yd);$W[$_e]=$gh;}$hh=$W[$Zd];$Yd=xxtea_mx($hh,$gh,$Xf,$y[$_e&3^$Qb]);$gh=int32($W[0]-$Yd);$W[0]=$gh;$Xf=int32($Xf-0x9E3779B9);}return
long2str($W,true);}$h='';$Qc=$_SESSION["token"];if(!$Qc)$_SESSION["token"]=rand(1,1e6);$sg=get_token();$Je=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Je[$y]=$X;}}function
add_invalid_login(){global$b;$Gc=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$Gc)return;$nd=unserialize(stream_get_contents($Gc));$jg=time();if($nd){foreach($nd
as$od=>$X){if($X[0]<$jg)unset($nd[$od]);}}$md=&$nd[$b->bruteForceKey()];if(!$md)$md=array($jg+30*60,0);$md[1]++;file_write_unlock($Gc,serialize($nd));}function
check_invalid_login(){global$b;$nd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$md=($nd?$nd[$b->bruteForceKey()]:array());$ce=($md[1]>29?$md[0]-time():0);if($ce>0)auth_error(lang(65,ceil($ce/60)));}$Ca=$_POST["auth"];if($Ca){session_regenerate_id();$Sg=$Ca["driver"];$M=$Ca["server"];$V=$Ca["username"];$E=(string)$Ca["password"];$l=$Ca["db"];set_password($Sg,$M,$V,$E);$_SESSION["db"][$Sg][$M][$V][$l]=true;if($Ca["permanent"]){$y=base64_encode($Sg)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($l);$Se=$b->permanentLogin(true);$Je[$y]="$y:".base64_encode($Se?encrypt_string($E,$Se):"");cookie("adminer_permanent",implode(" ",$Je));}if(count($_POST)==1||DRIVER!=$Sg||SERVER!=$M||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Sg,$M,$V,$l));}elseif($_POST["logout"]&&(!$Qc||verify_token())){foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(66).' '.lang(67));}elseif($Je&&!$_SESSION["pwds"]){session_regenerate_id();$Se=$b->permanentLogin();foreach($Je
as$y=>$X){list(,$Wa)=explode(":",$X);list($Sg,$M,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($Sg,$M,$V,decrypt_string(base64_decode($Wa),$Se));$_SESSION["db"][$Sg][$M][$V][$l]=true;}}function
unset_permanent(){global$Je;foreach($Je
as$y=>$X){list($Sg,$M,$V,$l)=array_map('base64_decode',explode("-",$y));if($Sg==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Je[$y]);}cookie("adminer_permanent",implode(" ",$Je));}function
auth_error($n){global$b,$Qc;$Df=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Df]||$_GET[$Df])&&!$Qc)$n=lang(68);else{restart_session();add_invalid_login();$E=get_password();if($E!==null){if($E===false)$n.=($n?'<br>':'').lang(69,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Df]&&$_GET[$Df]&&ini_bool("session.use_only_cookies"))$n=lang(70);$Ce=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Ce["lifetime"]);page_header(lang(36),$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(71)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(72),lang(73,implode(", ",$Ne)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Wc,$Le)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$Le,$A)&&($A[1]<1024||$A[1]>65535))auth_error(lang(74));check_invalid_login();$h=connect();$m=new
Min_Driver($h);}$Hd=null;if(!is_object($h)||($Hd=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($h)?h($h):(is_string($Hd)?$Hd:lang(32)));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.lang(75):''));}if($_POST["logout"]&&$Qc&&!verify_token()){page_header(lang(64),lang(76));page_footer("db");exit;}if($Ca&&$_POST["token"])$_POST["token"]=$sg;$n='';if($_POST){if(!verify_token()){$jd="max_input_vars";$Rd=ini_get($jd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Rd||$X<$Rd)){$jd=$y;$Rd=$X;}}}$n=(!$_POST["token"]&&$Rd?lang(77,"'$jd'"):lang(76).' '.lang(78));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(79,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(80);}function
email_header($Rc){return"=?UTF-8?B?".base64_encode($Rc)."?=";}function
send_mail($Ub,$Vf,$Td,$Hc="",$sc=array()){$ac=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$Td=str_replace("\n",$ac,wordwrap(str_replace("\r","","$Td\n")));$Oa=uniqid("boundary");$Aa="";foreach((array)$sc["error"]as$y=>$X){if(!$X)$Aa.="--$Oa$ac"."Content-Type: ".str_replace("\n","",$sc["type"][$y]).$ac."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$sc["name"][$y])."\"$ac"."Content-Transfer-Encoding: base64$ac$ac".chunk_split(base64_encode(file_get_contents($sc["tmp_name"][$y])),76,$ac).$ac;}$Ka="";$Sc="Content-Type: text/plain; charset=utf-8$ac"."Content-Transfer-Encoding: 8bit";if($Aa){$Aa.="--$Oa--$ac";$Ka="--$Oa$ac$Sc$ac$ac";$Sc="Content-Type: multipart/mixed; boundary=\"$Oa\"";}$Sc.=$ac."MIME-Version: 1.0$ac"."X-Mailer: Adminer Editor".($Hc?$ac."From: ".str_replace("\n","",$Hc):"");return
mail($Ub,email_header($Vf),$Ka.$Td.$Aa,$Sc);}function
like_bool($o){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$o["full_type"]);}$h->select_db($b->database());$ke="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Mb[DRIVER]=lang(36);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$K=array(idf_escape($_GET["field"]));$G=$m->select($a,$K,array(where($_GET,$p)),$K);$I=($G?$G->fetch_row():array());echo$m->value($I[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Kg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$B=>$o){if(!isset($o["privileges"][$Kg?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$B]);}if($_POST&&!$n&&!isset($_GET["select"])){$Gd=$_POST["referer"];if($_POST["insert"])$Gd=($Kg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Gd))$Gd=ME."select=".urlencode($a);$w=indexes($a);$Fg=unique_array($_GET["where"],$w);$Ze="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Gd,lang(81),$m->delete($a,$Ze,!$Fg));else{$N=array();foreach($p
as$B=>$o){$X=process_input($o);if($X!==false&&$X!==null)$N[idf_escape($B)]=$X;}if($Kg){if(!$N)redirect($Gd);queries_redirect($Gd,lang(82),$m->update($a,$N,$Ze,!$Fg));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$G=$m->insert($a,$N);$Ad=($G?last_id():0);queries_redirect($Gd,lang(83,($Ad?" $Ad":"")),$G);}}}$I=null;if($_POST["save"])$I=(array)$_POST["fields"];elseif($Z){$K=array();foreach($p
as$B=>$o){if(isset($o["privileges"]["select"])){$za=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$za="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$za="1*".idf_escape($B);$K[]=($za?"$za AS ":"").idf_escape($B);}}$I=array();if(!support("table"))$K=array("*");if($K){$G=$m->select($a,$K,array($Z),$K,array(),(isset($_GET["select"])?2:1));if(!$G)$n=error();else{$I=$G->fetch_assoc();if(!$I)$I=false;}if(isset($_GET["select"])&&(!$I||$G->fetch_assoc()))$I=null;}}if(!support("table")&&!$p){if(!$Z){$G=$m->select($a,array("*"),$Z,array("*"));$I=($G?$G->fetch_assoc():false);if(!$I)$I=array($m->primary=>"");}if($I){foreach($I
as$y=>$X){if(!$Z)$I[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary));}}}edit_form($a,$p,$I,$Kg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$w=indexes($a);$p=fields($a);$Dc=column_foreign_keys($a);$ie=$R["Oid"];parse_str($_COOKIE["adminer_import"],$ta);$pf=array();$f=array();$hg=null;foreach($p
as$y=>$o){$B=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$B!=""){$f[$y]=html_entity_decode(strip_tags($B),ENT_QUOTES);if(is_shortable($o))$hg=$b->selectLengthProcess();}$pf+=$o["privileges"];}list($K,$Jc)=$b->selectColumnsProcess($f,$w);$pd=count($Jc)<count($K);$Z=$b->selectSearchProcess($p,$w);$se=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Gg=>$I){$za=convert_field($p[key($I)]);$K=array($za?$za:idf_escape(key($I)));$Z[]=where_check($Gg,$p);$H=$m->select($a,$K,$Z,$K);if($H)echo
reset($H->fetch_row());}exit;}$Pe=$Ig=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$Pe=array_flip($v["columns"]);$Ig=($K?$Pe:array());foreach($Ig
as$y=>$X){if(in_array(idf_escape($y),$K))unset($Ig[$y]);}break;}}if($ie&&!$Pe){$Pe=$Ig=array($ie=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($ie));}if($_POST&&!$n){$ch=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Va=array();foreach($_POST["check"]as$Sa)$Va[]=where_check($Sa,$p);$ch[]="((".implode(") OR (",$Va)."))";}$ch=($ch?"\nWHERE ".implode(" AND ",$ch):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Hc=($K?implode(", ",$K):"*").convert_fields($f,$p,$K)."\nFROM ".table($a);$Lc=($Jc&&$pd?"\nGROUP BY ".implode(", ",$Jc):"").($se?"\nORDER BY ".implode(", ",$se):"");if(!is_array($_POST["check"])||$Pe)$F="SELECT $Hc$ch$Lc";else{$Eg=array();foreach($_POST["check"]as$X)$Eg[]="(SELECT".limit($Hc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$Lc,1).")";$F=implode(" UNION ALL ",$Eg);}$b->dumpData($a,"table",$F);exit;}if(!$b->selectEmailProcess($Z,$Dc)){if($_POST["save"]||$_POST["delete"]){$G=true;$ua=0;$N=array();if(!$_POST["delete"]){foreach($f
as$B=>$X){$X=process_input($p[$B]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($B)]=($X!==false?$X:idf_escape($B));}}if($_POST["delete"]||$N){if($_POST["clone"])$F="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($Pe&&is_array($_POST["check"]))||$pd){$G=($_POST["delete"]?$m->delete($a,$ch):($_POST["clone"]?queries("INSERT $F$ch"):$m->update($a,$N,$ch)));$ua=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Yg="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$G=($_POST["delete"]?$m->delete($a,$Yg,1):($_POST["clone"]?queries("INSERT".limit1($a,$F,$Yg)):$m->update($a,$N,$Yg,1)));if(!$G)break;$ua+=$h->affected_rows;}}}$Td=lang(84,$ua);if($_POST["clone"]&&$G&&$ua==1){$Ad=last_id();if($Ad)$Td=lang(83," $Ad");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Td,$G);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(85);else{$G=true;$ua=0;foreach($_POST["val"]as$Gg=>$I){$N=array();foreach($I
as$y=>$X){$y=bracket_escape($y,1);$N[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$G=$m->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Gg,$p),!$pd&&!$Pe," ");if(!$G)break;$ua+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(84,$ua),$G);}}elseif(!is_string($rc=get_file("csv_file",true)))$n=upload_error($rc);elseif(!preg_match('~~u',$rc))$n=lang(86);else{cookie("adminer_import","output=".urlencode($ta["output"])."&format=".urlencode($_POST["separator"]));$G=true;$db=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$rc,$Nd);$ua=count($Nd[0]);$m->begin();$L=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$J=array();foreach($Nd[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$L]*)$L~",$X.$L,$Od);if(!$y&&!array_diff($Od[1],$db)){$db=$Od[1];$ua--;}else{$N=array();foreach($Od[1]as$s=>$ab)$N[idf_escape($db[$s])]=($ab==""&&$p[$db[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$ab))));$J[]=$N;}}$G=(!$J||$m->insertUpdate($a,$J,$Pe));if($G)$G=$m->commit();queries_redirect(remove_from_uri("page"),lang(87,$ua),$G);$m->rollback();}}}$ag=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(48).": $ag",$n);$N=null;if(isset($pf["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($Dc[$X["col"]]&&count($Dc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$f&&support("table"))echo"<p class='error'>".lang(88).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($K,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($se,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($hg);$b->selectActionPrint($w);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$Fc=$h->result(count_rows($a,$Z,$pd,$Jc));$D=floor(max(0,$Fc-1)/$z);}$vf=$K;$Kc=$Jc;if(!$vf){$vf[]="*";$rb=convert_fields($f,$p,$K);if($rb)$vf[]=substr($rb,2);}foreach($K
as$y=>$X){$o=$p[idf_unescape($X)];if($o&&($za=convert_field($o)))$vf[$y]="$za AS $X";}if(!$pd&&$Ig){foreach($Ig
as$y=>$X){$vf[]=idf_escape($y);if($Kc)$Kc[]=idf_escape($y);}}$G=$m->select($a,$vf,$Z,$Kc,$se,$z,$D,true);if(!$G)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$D)$G->seek($z*$D);$Wb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$J=array();while($I=$G->fetch_assoc()){if($D&&$x=="oracle")unset($I["RNUM"]);$J[]=$I;}if($_GET["page"]!="last"&&$z!=""&&$Jc&&$pd&&$x=="sql")$Fc=$h->result(" SELECT FOUND_ROWS()");if(!$J)echo"<p class='message'>".lang(12)."\n";else{$Ja=$b->backwardKeys($a,$ag);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Jc&&$K?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(89)."</a>");$ae=array();$Ic=array();reset($K);$bf=1;foreach($J[0]as$y=>$X){if(!isset($Ig[$y])){$X=$_GET["columns"][key($K)];$o=$p[$K?($X?$X["col"]:current($K)):$y];$B=($o?$b->fieldName($o,$bf):($X["fun"]?"*":$y));if($B!=""){$bf++;$ae[$y]=$B;$e=idf_escape($y);$Xc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Fb="&desc%5B0%5D=1";echo"<th id='th[".h(bracket_escape($y))."]'>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Xc.($se[0]==$e||$se[0]==$y||(!$se&&$pd&&$Jc[0]==$e)?$Fb:'')).'">';echo
apply_sql_function($X["fun"],$B)."</a>";echo"<span class='column hidden'>","<a href='".h($Xc.$Fb)."' title='".lang(90)."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(43).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$Ic[$y]=$X["fun"];next($K);}}$Dd=array();if($_GET["modify"]){foreach($J
as$I){foreach($I
as$y=>$X)$Dd[$y]=max($Dd[$y],min(40,strlen(utf8_decode($X))));}}echo($Ja?"<th>".lang(91):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($J,$Dc)as$Zd=>$I){$Fg=unique_array($J[$Zd],$w);if(!$Fg){$Fg=array();foreach($J[$Zd]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Fg[$y]=$X;}}$Gg="";foreach($Fg
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($h).")").")";$X=md5($X);}$Gg.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$Jc&&$K?"":"<td>".checkbox("check[]",substr($Gg,1),in_array(substr($Gg,1),(array)$_POST["check"])).($pd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Gg)."' class='edit'>".lang(92)."</a>"));foreach($I
as$y=>$X){if(isset($ae[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($Wb[$y])||$Wb[$y]!=""))$Wb[$y]=(is_mail($X)?$ae[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Gg;if(!$_&&$X!==null){foreach((array)$Dc[$y]as$Cc){if(count($Dc[$y])==1||end($Cc["source"])==$y){$_="";foreach($Cc["source"]as$s=>$Kf)$_.=where_link($s,$Cc["target"][$s],$J[$Zd][$Kf]);$_=($Cc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($Cc["db"]),ME):ME).'select='.urlencode($Cc["table"]).$_;if($Cc["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($Cc["ns"]),$_);if(count($Cc["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Fg))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Fg
as$sd=>$W)$_.=where_link($s++,$sd,$W);}$X=select_value($X,$_,$o,$hg);$t=h("val[$Gg][".bracket_escape($y)."]");$Y=$_POST["val"][$Gg][bracket_escape($y)];$Sb=!is_array($I[$y])&&is_utf8($X)&&$J[$Zd][$y]==$I[$y]&&!$Ic[$y];$gg=preg_match('~text|lob~',$o["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$Sb)||$Y!==null){$Nc=h($Y!==null?$Y:$I[$y]);echo">".($gg?"<textarea name='$t' cols='30' rows='".(substr_count($I[$y],"\n")+1)."'>$Nc</textarea>":"<input name='$t' value='$Nc' size='$Dd[$y]'>");}else{$Id=strpos($X,"<i>…</i>");echo" data-text='".($Id?2:($gg?1:0))."'".($Sb?"":" data-warning='".h(lang(93))."'").">$X</td>";}}}if($Ja)echo"<td>";$b->backwardKeysPrint($Ja,$J[$Zd]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($J||$D){$fc=true;if($_GET["page"]!="last"){if($z==""||(count($J)<$z&&($J||!$D)))$Fc=($D?$D*$z:0)+count($J);elseif($x!="sql"||!$pd){$Fc=($pd?false:found_rows($R,$Z));if($Fc<max(1e4,2*($D+1)*$z))$Fc=reset(slow_query(count_rows($a,$Z,$pd,$Jc)));else$fc=false;}}$Ae=($z!=""&&($Fc===false||$Fc>$z||$D));if($Ae){echo(($Fc===false?count($J)+1:$Fc-$D*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.lang(94).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".lang(95)."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($J||$D){if($Ae){$Pd=($Fc===false?$D+(count($J)>=$z?2:1):floor(($Fc-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(96)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(96)."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" …":"");for($s=max(1,$D-4);$s<min($Pd,$D+5);$s++)echo
pagination($s,$D);if($Pd>0){echo($D+5<$Pd?" …":""),($fc&&$Fc!==false?pagination($Pd,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Pd'>".lang(97)."</a>");}}else{echo"<legend>".lang(96)."</legend>",pagination(0,$D).($D>1?" …":""),($D?pagination($D,$D):""),($Pd>$D?pagination($D+1,$D).($Pd>$D+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(98)."</legend>";$Kb=($fc?"":"~ ").$Fc;echo
checkbox("all",1,0,($Fc!==false?($fc?"":"~ ").lang(99,$Fc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Kb' : checked); selectCount('selected2', this.checked || !checked ? '$Kb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(89),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(85).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(100),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(101),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$Ec=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Ec['sql']);break;}}if($Ec){print_fieldset("export",lang(102)." <span id='selected2'></span>");$ye=$b->dumpOutput();echo($ye?html_select("output",$ye,$ta["output"])." ":""),html_select("format",$Ec,$ta["format"])," <input type='submit' name='export' value='".lang(102)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Wb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(103)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ta["format"],1);echo" <input type='submit' name='import' value='".lang(103)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$sg'>\n","</form>\n",(!$Jc&&$K?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($Q,$t,$B)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$G=$h->query("SELECT $t, $B FROM ".table($Q)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$B LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($I=$G->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($Q)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($I[0]))."'>".h($I[1])."</a><br>\n";if($I)echo"...\n";}exit;}else{page_header(lang(63),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(104).": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(43)."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.lang(105),'<td>'.lang(106),"</thead>\n";foreach(table_status()as$Q=>$I){$B=$b->tableName($I);if(isset($I["Engine"])&&$B!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$Q,in_array($Q,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($Q)."'>$B</a>";$X=format_number($I["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($Q)."'>".($I["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();
