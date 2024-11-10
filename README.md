# PHP-CRUD
Simple Create, Read, Update, Delete (CRUD) in PHP &amp; MySQL
<h2>Expaline the all file code step by step </h2>
<h1>Form.php File</h1>
HTML Tag:

<html lang="en"> 
  د HTML سند پیل ښیي او ژبه یې انګلیسي مشخصوي.
Head Section:

<head>
  د سند په اړه میټا معلومات لري.
<meta charset="UTF-8"> 
  د کرکټر انکوډینګ UTF-8 ته ټاکي، چې د مختلفو کرکټرونو پراخه ساحه ملاتړ کوي.
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  ویب پاڼه ځواب ورکوونکې کوي، د آلې د عرض پراساس یې ترتیب سموي.
<title>Simple Form</title>
  د سند عنوان ټاکي چې په براوزر ټب کې څرګندېږي.
Body Section:

<body> 
  د ویب پاڼې ښکاره محتوا لري.
<h3>Submit Your Information</h3> 
  د فرم لپاره سرلیک دی.
<form action="insert.php" method="post">
  فرم تعریفوي. د action ځانګړتیا مشخصوي چې د فرم معلومات چیرته ولېږل شي، او method="post" ښیي چې معلومات باید د POST طریقې په کارولو سره ولېږل شي.
Form Elements:

هر <label> عنصر د <input> عنصر سره د for ځانګړتیا له لارې تړلی دی، چې د لاسرسي ښه والی رامنځته کوي.
<input> عناصر د "text" او "email" ډولونه کاروونکي معلومات ټولوي. د required ځانګړتیا ډاډ ورکوي چې کاروونکی باید دا ساحې د فرم د سپارلو دمخه ډکې کړي.
وروستی <input> د سپارلو تڼۍ ده چې د فرم معلومات لیږي.
