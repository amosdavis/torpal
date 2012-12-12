A Portal for Small Business Forms
Author: Amos Davis
Email: amos@davistime.com
Date Created: ca. Winter 2009
License: GNU GPLv3

This web application was a personal project to facilitate form creation 
and processing for small businesses or local (and therefore small) 
branches of larger businesses.  The end goal was reliable record keeping 
and conversion of paper forms to online/html forms.

Benefits/Vision:

1) Forms could be designed by the administrative assistant using an 
html5 capable browser and a jqery driven drag-n-drop interface.

2) The created html forms were immediately saved to a mysql database 
containing all of the form templates.

3) Visual/Drawable surfaces were supported by way of html5's canvas  in 
Firefox and some awesome jquery to track and upload x/y coordinates of 
the mouse in IE8 (with the final conversion from x/y coordinates to 
actual lines on an image being completed by imagemagick).

4) The users could fill out the forms and have their answers stored in 
the mysql database and have an electronically signed/dated form emailed 
to the administrative assistant[s] or whoever was in charge of the 
forms. Abstraction of form ownership from the form design and form 
filling interfaces would be maintainted in the relational database and 
the form ownership (email address, name,phone,etc.) would be defined at 
form creation and stored in the database

5) Submitted forms could be converted to PDF documents for printing when 
physical documents were required.


Progress:

The form_maker.php file is where all the form creation magic happens.  
You can view these files for audio-less screencasts of the form creation 
process.

form_maker_demo.m4v

form_maker_demo.wmv

form_maker_demonstration.ogv

The storage of the created forms in the mysql database was complete and 
the basic drawing functions supporting forms that required visual 
representations of things using firefox and ie8 were complete.  I think 
I may have tested in ie6/7 but I can't remember. PDF output via 
server-side conversion was supported using wkhtmltopdf-i386.

Problems:

This project requires a lot of work to actually be useful in production,  
but the skeleton project is here and I may start active development in 
the future if I find myself filling out repetitive forms on a regular basis
