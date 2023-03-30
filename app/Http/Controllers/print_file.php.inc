function fetch_ticket_pdf($matchdata,$ticketdata=array(),$file_name='Q-Ticket',$save_file = false,$folder='') {
global $settings,$lang,$SSC ;
@ set_time_limit(60);
require_once(SYSTEM_DIR . 'tcpdf/tcpdf.php') ;
class SSC_PDF extends TCPDF {
public function Header() {
}
public function Footer() {
}
}
$pdf = new SSC_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false) ;
$pdf->SetFont('freeserif','',12) ;
$pdf->SetCreator('Q-Ticket') ;
$pdf->SetAuthor('Q-Ticket') ;
$pdf->SetTitle('Q-Ticket - 1.0') ;
$pdf->SetSubject('Q-Ticket - 1.0') ;
$pdf->SetKeywords('Q-Ticket') ;
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)) ;
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)) ;
$pdf->SetDefaultMonospacedFont(5) ;
$pdf->SetMargins(4,4,4) ;
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER) ;
$pdf->SetFooterMargin(4) ;
$pdf->SetAutoPageBreak(true, 4) ;
$lg = array() ;
$lg['a_meta_charset']  = 'UTF-8' ;
$lg['a_meta_dir']      = 'ltr' ;
$lg['a_meta_language'] = 'ar' ;
$pdf->setLanguageArray($lg) ;

$pdf->AddPage() ;

$bMargin = $pdf->getBreakMargin();
$auto_page_break = $pdf->getAutoPageBreak();
$pdf->SetAutoPageBreak(false, 0);
$img_file = SYSTEM_DIR .'docs/ticket.png' ;
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
$pdf->setPageMark();

if($ticketdata['ticket_id']){
$qrcode_text = seoURL('ticket/'.$ticketdata['ticket_id'].'/'.get_ticket_key($ticketdata).'/');
$TOTAL_V = $ticketdata['ticket_price'];
$VAT_V = $ticketdata['ticket_price']-$ticketdata['ticket_price']*100/115;
$TOTALWITHOUTVATE = $TOTAL_V-$VAT_V;
$qrcode_text_VAT = 'نادي القادسية السعودي'."\n";
$qrcode_text_VAT .= 'Al-Qadsiah Sports Club'."\n";
$qrcode_text_VAT .= 'Inv. No : '.$ticketdata['ticket_id']."\n";
$qrcode_text_VAT .= 'Date : '.date('Y-m-d',$ticketdata['ticket_time'])."\n";
$qrcode_text_VAT .= 'VAT No : 310490698300003'."\n";
$qrcode_text_VAT .= 'Total Am : '.$TOTALWITHOUTVATE."\n";
$qrcode_text_VAT .= 'VAT Am : '.($ticketdata['ticket_price']-$ticketdata['ticket_price']*100/115)."\n";
$qrcode_text_VAT .= 'Total + VAT : '.$ticketdata['ticket_price']."\n";
$qrcode_text_VAT .= 'Customer : '.$ticketdata['ticket_name']."\n";
$qrcode_text_VAT .= 'Customer VAT NO : '."\n";
}else{
$qrcode_text = seoURL();
$qrcode_text_VAT = seoURL();
}

if(substr($ticketdata['ticket_color'],0,1) == '#'){
$ticket_color_rgb = sscanf($ticketdata['ticket_color'], "#%02x%02x%02x");
$html = $ticketdata['match_seats_group'] ;
$pdf->SetFont('freeserif', '',10);
$pdf->SetDrawColor($ticket_color_rgb[0],$ticket_color_rgb[1],$ticket_color_rgb[2]);
$pdf->SetFillColor($ticket_color_rgb[0],$ticket_color_rgb[1],$ticket_color_rgb[2]);
$pdf->SetTextColor(255,255,255);
$fill = 1 ;
if($ticket_color_rgb[0] > 250 and $ticket_color_rgb[1] > 250 and $ticket_color_rgb[2] > 250 ){
$fill = 0 ;
}
$pdf->writeHTMLCell(210,6,0,0, $html,0, 1,$fill, true, 'C',true);
}

if($ticketdata['ticket_id'] or $ticketdata['is_preview']){
$html = 'الرقم الضريبي : 310490698300003' ;
$pdf->SetFont('freeserif', '',14);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0, 0, 0);
$pdf->writeHTMLCell(90,10,3,59, $html,0, 1, 0, true, 'C',true);

$html = 'قيمة التذكرة : '.'<br />يشمل الضريبه 15% : ' ;
$pdf->SetFont('freeserif', '',14);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0, 0, 0);
$pdf->writeHTMLCell(77,10,3,73, $html,0, 1, 0, true, 'C',true);

$html = ' SAR '.$ticketdata['ticket_price'] ;
$pdf->SetFont('freeserif', '',14);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(25, 117, 45);
$pdf->writeHTMLCell(25,10,3,73, $html,0, 1, 0, true, 'C',true);

$vat = $ticketdata['ticket_price']-$ticketdata['ticket_price']*100/115;
$html = moneyformatPDF($vat) ;
$pdf->SetFont('freeserif', '',10);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(25, 117, 45);
$pdf->writeHTMLCell(22,10,3,80, $html,0, 1, 0, true, 'C',true);

$html = 'رقم التذكرة' ;
$pdf->SetFont('freeserif', '',14);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0, 0, 0);
$pdf->writeHTMLCell(46,10,156,73, $html,0, 1, 0, true, 'C',true);

$html = $ticketdata['ticket_id'] ;
$pdf->SetFont('freeserif', '',20);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(214, 24, 21);
$pdf->writeHTMLCell(46,10,156,78, $html,0, 1, 0, true, 'C',true);

$html = 'فئة التذكرة' ;
$pdf->SetFont('freeserif', '',14);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0, 0, 0);
$pdf->writeHTMLCell(78,10,66,73, $html,0, 1, 0, true, 'C',true);

$html = 'sss التذكرة' ;
$pdf->SetFont('freeserif', '',14);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0, 0, 0);
$pdf->writeHTMLCell(78,10,66,60, $html,0, 1, 0, true, 'C',true);

$html = $ticketdata['match_seats_group'] ;
$pdf->SetFont('freeserif', '',20);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0, 76, 183);
$pdf->writeHTMLCell(78,10,66,78, $html,0, 1, 0, true, 'C',true);

}

$qrcode_image = 'qrcode_'.time().rand_code(10).'_'.rand_code(10).'.png' ;
$qrcode_image = make_qrcode($qrcode_text,$qrcode_image);
$qrcode_image_VAT = 'qrcode_'.time().rand_code(10).'_'.rand_code(10).'.png' ;
$qrcode_image_VAT = make_qrcode_VAT($qrcode_text_VAT,$qrcode_image_VAT);

$html = '<img src="'.$qrcode_image.'" />' ;
$pdf->SetFont('freeserif', '', 12);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0,63,127);
$pdf->writeHTMLCell(60,40,20,24, $html,0 , 1, 0, true, 'C',true);

$html = '<img src="'.$qrcode_image_VAT.'" />' ;
$pdf->SetFont('freeserif', '', 12);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0,63,127);
$pdf->writeHTMLCell(31,40,168,252, $html,0 , 1, 0, true, 'C',true);

$lg['a_meta_charset']  = 'UTF-8' ;
$lg['a_meta_dir']      = 'rtl' ;
$lg['a_meta_language'] = 'ar' ;
$pdf->setLanguageArray($lg) ;

$html_match_teams = '<table class="text-center" style="width:100%;" dir="rtl" >
    <tr>
        <td style="width:40%;font-size:18px;color:#666666;">'.$matchdata['match_team_1_name'].'<br /><img src="'.$settings['data_folder'].'images/'.$matchdata['match_team_1_logo'].'" alt="" style="width:88px;" /></td>
        <td style="width:20%;color:#666666;">&nbsp;<br />&nbsp;<br />&nbsp;<br /><img src="'. $settings['style_folder'] .'images/vs.png" alt="" style="width:48px;height:48px;" /></td>
        <td style="width:40%;font-size:18px;color:#666666;">'.$matchdata['match_team_2_name'].'<br /><img src="'.$settings['data_folder'].'images/'.$matchdata['match_team_2_logo'].'" alt="" style="width:88px;" /></td>
    </tr>
</table>';
$pdf->SetFont('freeserif', '', 12);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0,63,127);
$pdf->writeHTMLCell(200,100,5,116, $html_match_teams,0 , 1, 0, true, 'C',true);

$html_match_teams = '<table class="text-center" style="width:100%;" dir="rtl" >
    <tr>
        <td style="font-size:36px;color:#666666;">'.(($matchdata['league_logo'] and file_exists($settings['data_folder'].'images/'.$matchdata['league_logo'])) ? '<img src="'.$settings['data_folder'].'images/'.$matchdata['league_logo'].'" alt="" style="width:70px;" />':'').'</td>
    </tr>
</table>';
$pdf->SetFont('freeserif', '', 12);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0,63,127);
$pdf->writeHTMLCell(40,24,120,210, $html_match_teams,0, 1, 0, true, 'C',true);

if(!empty($matchdata['match_tickets_notes'])){
$match_tickets_notes = '<table class="text-center" style="width:100%;" dir="rtl" cellpadding="10" >
    <tr>
        <td style="color:#666666;border-right:2px solid #83CD7D;height:70px;">'.nl2br($matchdata['match_tickets_notes']).'</td>
    </tr>
</table>';
$pdf->SetFont('freeserif', '', 10);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0,63,127);
$pdf->writeHTMLCell(150,25,45,250, $match_tickets_notes,0, 1, 0, true, 'R',true);
}


$hijri_date = $matchdata['match_hijri_date'] ;
$match_date = '&nbsp; '.fetch_day_name($matchdata['match_time']).'<b></b> <b style="color:#82CE7C;" > '.$hijri_date.' </b>'.$lang['hijri'].''
.'<br />&nbsp; '.$lang['corresponding_to'].'<b></b> <b style="color:#82CE7C;" > '.date('Y-m-d',$matchdata['match_time']).' </b> '.$lang['gregorian']
.'<br />&nbsp; '.$lang['the_hour'].'<b></b> <b style="color:#82CE7C;" dir="rtl">'.date('h:i',$matchdata['match_time']).'</b>  <b></b>'.$lang[date('a',$matchdata['match_time'])].'';

if(trim($ticketdata['partnerdata']['partner_name'])!=''){
$partner_info = ' <b> المستفيد </b><b>'.trim($ticketdata['partnerdata']['partner_name']).'</b>' ;
}else{
$partner_info = '' ;
}

$html_league = '<table class="text-center" style="width:100%;" dir="rtl" >
    '.(($ticketdata['partner_id'])? '
    <tr>
        <td style="color:#DDA11F;font-size:12px;"><span class="label label-info" style="display:block;padding:8px;margin:4px auto;" >تم إصدار التذكرة عبر موقع تذاكر القادسية بتاريخ </span> <b> '.date('Y-m-d',$ticketdata['ticket_time']).' </b> الساعة <b dir="rtl">'.date('h:i',$ticketdata['ticket_time']).'</b> <b></b>'.$lang[date('a',$ticketdata['ticket_time'])].$partner_info.'</td>
    </tr>
    ':'
    <tr>
        <td style="color:#004BB6;"><span class="label label-info" style="display:block;padding:8px;margin:4px auto;" >تم الشراء عبر موقع تذاكر القادسية بتاريخ </span> <b> '.date('Y-m-d',$ticketdata['ticket_time']).' </b> الساعة <b dir="rtl">'.date('h:i',$ticketdata['ticket_time']).'</b> <b></b>'.$lang[date('a',$ticketdata['ticket_time'])].'</td>
    </tr>
    ').'
    <tr>
        <td><span class="label label-info" style="display:block;padding:8px;margin:4px auto;color:#82CE7C;" >'.$lang['league'].':</span></td>
    </tr>
    <tr>
        <td><span class="label label-info" style="display:block;padding:8px;margin:4px auto;color:#666666;" >&nbsp; '.$matchdata['league_name'].'</span></td>
    </tr>
    <tr>
        <td><span class="label label-info" style="display:block;padding:8px;margin:4px auto;color:#82CE7C;" >'.$lang['stadium'].':</span></td>
    </tr>
    <tr>
        <td><span class="label label-info" style="display:block;padding:8px;margin:4px auto;color:#666666;" >&nbsp; '.$matchdata['stadium_name'].'</span></td>
    </tr>
    <tr>
        <td><span class="label label-info" style="display:block;padding:8px;margin:4px auto;color:#82CE7C;" >'.$lang['match_date'].':</span></td>
    </tr>
    <tr>
        <td><span class="label label-info" style="display:block;padding:8px;margin:4px auto;color:#666666;">'.$match_date.'</span></td>
    </tr>
    <tr>
        <td><span style="display:block;padding:8px;margin:4px auto;color:'.(($ticketdata['ticket_parking'])?'green':'red').';font-size:14px;">'.(($ticketdata['ticket_parking'])?'* يسمح بدخول السيارات.':'* لا يسمح بدخول السيارات.').'</span></td>
    </tr>
</table>';
$pdf->SetFont('freeserif', '', 12);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(0,63,127);
$pdf->writeHTMLCell(186,5,15,185, $html_league,0, 1, 0, true, 'R',true);

if($ticketdata['is_preview']){
for($i=0;$i<15;$i++){
$html = 'معاينة تذاكر القادسية' ;
$pdf->SetFont('freeserif', '', 14);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(198, 198, 198);
$pdf->writeHTMLCell(40,6,150,$i*20, $html,0, 1, 0, true, 'C',true);
}
}elseif($ticketdata['ticket_id'] and !$ticketdata['ticket_paid']){
for($i=0;$i<15;$i++){
$html = 'غير مدفوعة' ;
$pdf->SetFont('freeserif', '', 16);
$pdf->SetDrawColor(255,0,0);
$pdf->SetTextColor(255,0,0);
$pdf->writeHTMLCell(40,6,150,$i*20, $html,0, 1, 0, true, 'C',true);
}
}

if(!$save_file){
$pdf->Output($file_name.'.pdf', 'i') ;
@unlink($qrcode_image);
exit;
} else {
$save_file = $file_name.'.pdf' ;
@ unlink($save_file);
$pdf->Output($save_file, 'F') ;
@unlink($qrcode_image);
return $save_file ;
}
}
