# PHP-CRUD
Simple Create, Read, Update, Delete (CRUD) in PHP &amp; MySQL
<h2>Expaline the all file code step by step </h2>
<h1>Form.php File</h1>


    Document Type Declaration:
    <!DOCTYPE html> specifies that this document is an HTML5 document.

    HTML Tag: <html lang="en">
    indicates the start of the HTML document and specifies the language as English.

    Head Section:
        <head> contains meta-information about the document.
        <meta charset="UTF-8"> sets the character encoding to UTF-8, allowing for a wide range of characters.
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> makes the web page responsive, adjusting its layout based on the device's width.
        <title>Simple Form</title> sets the title of the document that appears in the browser tab.

    Body Section:
        <body> contains the visible content of the web page.
        <h3>Submit Your Information</h3> is a heading for the form.
        <form action="insert.php" method="post"> defines the form. The action attribute specifies where to send the form data upon submission, and method="post" indicates that the data should be sent using the POST method.

    Form Elements:
        Each <label> element is associated with an <input> element via the for attribute, which improves accessibility.
        <input> elements of type "text" and "email" gather user input. The required attribute ensures that the user must fill these fields before submitting the form.
        The final <input> is a submit button that sends the form data.
<h1>Insert.php file </h1>
