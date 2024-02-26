<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
 session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
     require "vnav.php";
     require "boot.php";
    require "config.php";
 }
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
     require "nav.php";
     require "boot.php";
     require "config.php";
 }
//  require "vnav.php";
//  require "nav.php";
//  require "boot.php";
 
 echo"<center class='mb-5'><h1><u>OUR TEAM</u></h1></center>";
   
   $sql = "SELECT * FROM admin_db";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result))
   {
       $name = $row['name'];
       $email = $row['email'];
       $phone = $row['phone'];
       $avatar = $row['avatarlink'];
       $since = $row['datetime'];
       $level = $row['admin_level'];
       $linkdein = $row['linkedin'];
       $github = $row['github'];
       $website = $row['website'];
       $instagram = $row['instagram'];
       $desc = $row['description'];


       // echo "
       //   <table class='table table-striped table-hover'>
       //     <tr>
       //       <td><img src='$avatar' alt='avatar' style='width:50px; height:50px; border-radius:50%;'></td>
       //       <td>$name</td>
       //       <td>$since</td>
       //       <td>$level</td>
       //     </tr>
       // ";
       ?>
       <div class="card mb-5" style="max-width: 540px;">
 <div class="row g-0">
   <div class="col-md-4">
     <img
       src="<?php echo $avatar ;?>"
       alt="Trendy Pants and Shoes"
       class="img-fluid rounded-start"
     />
     <small class="">Level <?php echo $level;?> admin</small> <br>
     <small class="">Since <?php echo $since;?>  </small>
   </div>
   <div class="col-md-8">
     <div class="card-body">
       <h5 class="card-title"><?php echo $name;?></h5>
       <p class="card-text">
        <?php        
        echo $desc."<br>";?>
        <br>
       Email:<u><a style = "color:#000;" href="mailto:<?php echo $email;?>"><?php echo $email."<br>";?></a></u>
       <br>
       Phone:<u><a style = "color:#000;" href="tel:<?php echo $phone;?>"><?php echo $phone."<br>";?></a></u>
       <div class="d-flex justify-content-evenly">
        <u><a style = "font-size :18px;" href="<?php echo $website;?>"><br><i class="fa-solid fa-globe"></i></a></u>
        <u><a style = "font-size :18px;" href="<?php echo $github;?>"><br><i class="fa-brands fa-github"></i></a></u>
        <u><a style = "font-size :18px;" href="<?php echo $linkdein;?>"><br><i class="fa-brands fa-linkedin"></i></a></u>
        <u><a style = "font-size :18px;" href="<?php echo $instagram;?>"><br><i class="fa-brands fa-instagram"></i></a></u>
       </div>
       <?php
        ?>
       </p>
       <p class="card-text">
         <!-- <small class="">Joined <?php //echo $since;?>  </small> -->
       </p>
     </div>
   </div>
 </div>
</div>


       

       


<?php



   }
   ?>
    

<button  onclick="fun1()">view more</button>
<div style="display:none; " id= "dim" >

A PROJECT REPORT ON
"EMPLOYMENT CENTERED CONTENT CREATION SITE"
In fulfilment for the award of the degree of

DIPLOMA ENGINEERING

In

COMPUTER ENGINEERING

Submitted By:

Gandhi Devang (206840307019)

Khatik Ajay (206840307004)




Gujarat Technological University, Ahmadabad
Grow More Faculty of Diploma Engineering, Himmatnagar 
2022-23


Grow More Faculty of Diploma Engineering, Computer Engineering


Certificate
Date:	/	/ 	


This is to certify that entitled has been carried "EMPLOYMENT CENTERED CONTENT CREATION SITE" out by Gandhi Devang & Khatik Ajay under my guidance in fulfilment of the Diploma of Engineering in Information & Technology Engineering (5th Semester) of Gujarat Technological University, Ahmadabad during the academic year 2022-23.
















Prof. KamalJeet Kaur
Computer Engineering     Department
Prof. Meghal Prajapati
            Head of Department Computer Engineering Department
Grow More Faculty of Diploma Engineering

ACKNOWLEDGMENT

This is to place on record our appreciation and deep gratitude to the persons without whose support this project would never been seen the light of the day.
We express my sincere thanks to Prof. Meghal Prajapati, H.O.D of the Computer Engineering Department for extending his help.
We have immense pleasure in expressing thanks and deep sense of gratitude to my guide Prof. Kamaljeet Kaur and the entire Faculty in Information & Technology Engineering for his valuable suggestion and guidance throughout this project.
Finally, at the outset we would like to thank all those who have directly or indirectly helped us accomplish our project successfully.














TEAM MEMBER:
Gandhi Devang (206840307019)
Khatik Ajay (206840307004)




ABSTRACT

This Website Will Help Employers to Find Skilled
Employees and Job Seekers to Showcase Their Skills and
Creativity Get Their Dream Job with An Amazing Feature
of Social Network They Can Post Images Videos of
Showcasing Their Skills and Their Past Works and
Achievements and the Individual can upload videos and even
courses and the course certificate will be provided by us
LIST OF SYMBOLS, ABBREVIATIONS, AND NOMENCLATURE




Symbol
Operation





Class


1. Generalization

2. Inheritance

3. Composition

4. Aggregation

5. Dependencies

6. Properties

7. Multiplicity


Terminal (Start of Stop)

	

Flow Lines or Arrow



Input / Output




Decision



Connector


Actor



Use Case





Relationship





Object





Lifeline





Message Call
ABBREVIATIONS


TERM
DEFINATION
HTML
-Hyper Text Mark-up Language
WWW
-World Wide Web

SQL
-SQL (Structured Query Language) Server Management Studio Express (SQL Server 2005)
CSS 
-Cascading style sheet

LAN

-Local Area Network

OS

-Operating System

PHP

-Personal home Page /
Hypertext Preeprocessor

RAM

-Random Access Memory

MB

-Mega Bytes

GB

-Giga Bytes

Mbps

-Megabits per second

HDD

-Hard Disk Drive

List OF Figures
Figure 1 Incremental Life Cycle Model	9
Figure 2 Flowchart	12
Figure 3 Individual Use case	13
Figure 4 Business Use Case	14
Figure 5 Admin Use Case	15
Figure 6 Admin Sequence	16
Figure 7 Individual Sequence	17
Figure 8 Figure 8 Business Sequence	18
Figure 9 Class Diagram	19
Figure 10 ER Diagram	20
Figure 11 Admin Activity Diagram	32
Figure 12 Customer Activity	33
Figure 13 Scrap picker Activity	34
Figure 14 0 Level DFD (Context Level DFD)	36
Figure 15 Admin First Level DFD	37
Figure 16 Scrap Collector admin Second Level DFD	38
Figure 17 Customer First Level DFD	39
Figure 18 Customer Second Level DFD	40
Figure 19 Scrap Picker First Level DFD	41
Figure 20 Scrap Piker Second Level DFD	42



LIST OF TABLES
Table 1 Individual Master Table	21
Table 2 Customer Master Table	22
Table 3 Scrap Piker Master Table	23
Table 4 Category Master Table	24
Table 5 Sub Category Master Table	24
Table 6 Cart Order Master Table	25
Table 7 Final Order Master Table	26
Table 8 Scrap Piker Master Table	27
Table 9 State Master Table	28
Table 10 City Master Table	28
Table 11Product Donate Master Table	29
Table 12 Product Category Master Table	30
Table 13 Product Sub Category Master Table	30
Table 14 Post Query Table	31









TABLE OF CONTENTS

Table of Contents
CHAPTER 1. INTRODUCTION	4
1.1 Problem Summery	4
1.2 Purpose and Objective	4
1.3 Scope	4
1.4 Project Features	4
1.5 Technology and Literature Review	5
1.6 Function Specification	6
1.7 Functional Requirement	7
1.8 Non-Functional Requirement and Individual Constraints	7
CHAPTER 2. SYSTEM MANAGEMENT	9
2.1 System Model Project Development Approach	9
2.2 Advantages of Incremental Model	9
CHAPTER 3. SYSTEM ANALYSIS	10
3.1 Study of Current System	10
3.2 Problem and Weakness of Current System	10
3.3 Requirement of the new system	10
3.4 Functional of System	11
3.5 Data Modeling	12
3.5.1 Flowchart	12
3.5.2 Use Case Diagram	13
3.5.3 Sequence Diagram	16
3.5.4 Class Diagram	19
3.5.5 E R Diagram	20
3.6 Database Design (Data Dictionary)	Error! Bookmark not defined.
3.7 System Activity	32
3.8 Requirement Validation	35
3.9 Function and Behavioral Modeling	35
3.10 Implementation Environment	42
3.10.1 Security Features	43
3.10.2 Coding Standards	43




CHAPTER 1. INTRODUCTION
1.1 Problem Summery

    In the problem summary of "EMPLOYMENT CENTERED CONTENT CREATION SITE" in existing system the student has to acquire skills at different place and sometimes it could get costly so and with not recognition if it free or from YouTube and then more self-learn and then and if someone want to show their teaching skills with no long registration is impossible and the to get views is very hard and getting job from form is a hard part too and then you earn some money

    The Main purpose and Objective of Our Web Application is to Help some create educational content and learn in free and get Certified and getting jobs at one place they can create job openings easily job seekers can easily apply for jobs and internships

1.2 Scope
    The Scope of our website is to help Individual learn, teach, hire, and get job at same place with single login easily
    

1.3 Project Features

There are three main Individuals and on Admin:
 Visitor
  Individual
  Business
 Admin



Admin:
Admin can manage everything like Individuals, companies, delete data, verify Individuals, manage reports, suspends Individuals access from website, give certificates, delete all data on the webpage, can login and logout.
Individual:
Individual Can Register, Login, search jobs, post jobs for Business, can apply for jobs can watch videos and playlist, can get certificates, can report wrong things to admin, can, like videos, can comment on videos, manage own profile, delete own profile and content.

Visitor:
Visitor can visit Home Page, can visit about page, can register,

Business:
Login, manage profile, hire candidates, post jobs, select hirers, make videos, see videos, like and comment on videos, report wrongful actions to admin, apply for verification, manage own profile, delete own content.


1.4 Technology and Literature Review
Tools: The software tools used in the development of this application are:

 Visual Studio Code
 HTML, CSS, bootstrap as Frontend Development
 PHP Backend Scripting Language
 JavaScript jQuery as client-side scripting language
 My SQL Server 5.5.8 as a back-end Database Server
 Microsoft Visio 2007 as a drawing tool
 Microsoft word 2019 as a documentation
 Microsoft PowerPoint 2019 as a presentation
 XAMPP local server for local PHP and SQL server support

Let us under go in detail about various technologies involved...
Features:
➢ All in one server support by XAMPP
➢ Bootstrap making pages responsive with less CSS code 
➢ jQuery to make it much easier to use JavaScript and for frontend form validations
➢ Visual studio code is a multipurpose IDE which is light on system so it runs smoothly 

My SQL Server 5.5.8:
My SQL Server 5.5.8 is a comprehensive, integrated data management and analysis software that enables organization to reliability manages mission-critical information and confidently run complex business application.
Features:
With MySQL Server 5.5.8, Individuals and IT Professional across your organization will benefit from reduced application downtime, increased scalability and performance, and tight yet flexible security controls.
1.5 Function Specification Visitor:
 Visitor can visit home page.
 Visitors can visit about page
 Can register on our Web site 
 Can login if already registered

Customer:
> Individual can Login
> Individual can Registration.
> Individual Can Search Scrap Piker.
> Individual Can Create Pickup Booking.
> Individual Can Complete Booking List.
> Individual Can Print Sell Receipt.
> Individual Can Donate Product.
> Individual Can Generate Report.

Admin:
> Admin Can Login
> Admin Can Manage Category
> Admin Can Manage Sub Category
> Admin Can Manage Donate Product.
> Admin Can Manage Scrap Piker.
> Admin Can Manage Booking Pickup Order.
> Admin Can Manage Customers.
> Admin Can Manage Complete Pickup Order.
> Admin Can Mange Report.


Business
> Business can register.
> Business can Login.
> Business can manage profile 
> Business Can upload course
> Business can select Hirers
> Business can post jobs
> Business can hire candidates
> Business can chat with applicants


1.6 Functional Requirement Software Requirements:
SERVER SIDE
➢ Platform: PHP
➢ Back End Tools: MY SQL Server 5.5.8
➢ Operating System: Windows 2007 or Upper Version
➢ Web Server: APACHE
➢ Stable internet connection
        CLIENT SIDE
➢ Browser Support: Internet Explorer 8 or upper or any other equivalent
➢ Stable internet connection

Hardware Requirements:
SERVER SIDE
➢ Processer: Intel i3 or upper or any other equivalent
➢ Hard disk: 50 GB (minimum)
➢ RAM: 4GB(Minimum)
➢ 
  CLIENT SIDE
	DEVICE COMPUTER
> Processer: Intel i3 dual co
> Hard disk: 256 GB or Higher
> RAM: 512MB      
	DEVICE PHONE
> Storage: 8GB
> RAM: 1GB
> Dual core processor
> WEB Browser


Servers/ Database:
➢ My SQL Server 5.5.8
Software Used:
 Visual Studio Code
1.7 Non-Functional Requirement and Individual Constraints:
➢ 	Individual Interface - When Individual and Business log out from the web & application, Individual and Business will be navigated to their corresponding login page. And if Individual and Business want to navigate on lastly accessed page (previous page from where they had logged out) then Individual cannot navigate to that previous page.
➢ 	Communication Interface- The portal needs to interact with different set of applications and portals.
➢ 	Criticality of the Application-If the system is of lower configuration and the Individual operates on larger Forms or database then there may be chances of memory overflow. This problem is mainly related with operating system memory management but we can neglect it for regular operation of software.


➢ 	Safety & Security consideration-The passwords provided by the Individuals are passed in encrypted format. The facility of making password stronger is also provided like combinations of characteristics, symbols and numbers will create a strongest password which cannot be hacked by hacker.
Security to move on different pages (web forms) of the system is also provided. Unauthorized Individuals cannot access to the administrator panel.

➢ 	Hardware Limitations-This topic includes hardware requirements for installing the Net Beans 8.2, My SQL server 2012, Microsoft office 2013, and Microsoft Visio 2007. The computer on which you install these software's should meet the following system requirements.

Figure 1 Incremental Life Cycle Model


CHAPTER 2. SYSTEM MANAGEMENT

2.1 System Model Project Development Approach:
    In incremental model the whole requirement is divided into various builds. Multiple development cycles take place here, making the life cycle a "multi-waterfall" cycle. Cycles are divided up into smaller, more easily managed modules.     Each module passes through	the requirements, design,   implementation and testing phases. A working version of software is produced during the first module, so you have working software early on during the software life cycle. Each subsequent release of the module adds function to the previous release. The process continues till the complete system is achieved.


2.2 Advantages of Incremental Model:

> Generates working software quickly and early during the software life cycle.
> This model is more flexible - less costly to change scope and requirements.
> It is easier to test and debug during a smaller iteration.
> In this model customer can respond to each built.
> Lowers initial delivery cost.


CHAPTER 3. SYSTEM ANALYSIS

3.1 Study of Current System:
In the problem summary of "EMPLOYMENT CENTERED CONTENT CREATION SITE" in existing system the student has to acquire skills at different place and sometimes it could get costly so and with not recognition if it free or from YouTube and then more self-learn and then and if someone want to show their teaching skills with no long registration is impossible and the to get views is very hard and getting job from form is a hard part too and then you earn some money
3.2 Problem and Weakness of Current System:
     We have visited in to some web site like linked.com https://www.linked.com/ and Youtube.com https://www.youtube.com and the limitations are:

 Both are two different platform 
 YouTube learning have no certification 
 LinkedIn offers courses but Individuals have to pay for that  
 Self-learning is hard without recognition
 No guarantee for jobs after learning from YouTube

3.3 Requirement of the new system:
 Combine job searching and learning on one platform  
 Individuals needed to be encouraged for uploading content
 In new system web application support multiple language
 Advance search option
 Web based application
 No need of any software installation, as requires only browsers
 Can operate from any computers connected to internet.
 Can operate on smart phones/tablets through responsive design

 
This evaluation determines whether the technology needed for the                                        propose system is available or not. This is concerned with specifying satisfy the Individual requirements. The technical needs of the system may include front-end and backend-selection. An important issue for the development of a project is the selection of suitable front -end and back-end. Based on some aspects, we select the most suitable platform that suits the needs the organization.

Operational Feasibility:
The present system is easily understandable. The Individuals are presented with friendly Individual interface that helps them to understand the flow of the system more easily. Maximum transparency has been provided. The new system is very much Individual friendly and operational cost is bearable.
Requirement validation examines the specifications to ensure that all system requirements have been stated unambiguously, that inconsistency; omissions, and errors have been detected and corrected; and that work   products conform to the standards established for the process, the project and the project. Specified requirement validation was done through meeting with the project leader, senior persons or concerned employees. Checking should be done so that the requirements are stated clearly.
3.4 Functional of System:
The Main Functionality of job search and social media   System is:
 Search jobs and apply for them 
 Post jobs and hire people
 People will post the content according to their audience and audience will watch that 
 This site will bring all three at one platform and content creation will happen according the market (for example more people want python course) so more python courses will be uploaded
Economic Feasibility:
For declaring that the system is economically feasible, the benefits obtained from the system has to be rated against the cost incurred to actually develop the system. The following are the benefits that would be derived from the proposed system.
➢ 	Saves time of a fresher into getting faster jobs and for free
➢ 	Helps hiring talented people for free  
➢ Upload content to show case your teaching skills for free without the hussele of YouTube algorithm
➢ 	Benefits like time saving, cost effectivity are there
3.5 Data Modeling

3.5.1 Flowchart


Figure 2 Flowchart


3.5.2 Use Case Diagram
     A use case is a set of scenarios that describing an interaction between a Individual and a system. A use case diagram represents the relationship among actors and use case. The two main components of a use case diagram are use case and actors. Actors are something or someone which exists outside the system under study, and who take part in a sequence of activities in a dialogue with the system, to achieve goal: they may be end Individuals, other systems, or hardware devices.
3.5.2.1 Individual Use case

Figure 3 Individual Use case




3.5.2.2 Business Use Case

Figure 4 Business Use Case






3.5.2.3 Admin Use Case


Figure 5 Admin Use Case


3.5.3 Sequence Diagram
     It shows object interaction arranged in time sequence. It depicts the object and classes involved in the scenario and the sequence of message exchanged between the objects needed to carry out the functionality of the scenario. Sequence diagram are sometime called as Event Diagram or else Event Scenarios.
3.5.3.1 Admin Sequence


Figure 6 Admin Sequence




3.5.3.2 Individual Sequence

Figure 7 Individual Sequence




3.5.3.3 Business Sequence

Figure 8 Business Sequence












3.5.4 Class Diagram


Figure 9 Class Diagram





3.5.5 E R Diagram


Figure 10 ER Diagram


3.6 Database Design (Data Dictionary)
1) Admin_Master :-
• Table Name : admin
• Primary Key : Individual_Id
• Description: This Table Is Used for Login Information Of Administrator. uname Is Used For Recover Password.
No
Field Name
Data Type
Constrain
Description
1
Individual-Id
Int
Primary Key
Individual Primary Key
2
uname
Varchar
-
Admin username name
3
aname
Varchar 
-
Admin name
3
Email
Varchar
-
Individual-Email
4
Password
Varchar
-
Individual-Password
5
Module
Varchar
-
Individual-Module
6
Entry-Date
Date-Time
-
Individual-Entry-Date
7
Update-On
Date-Time
-
Individual-Update-On

Table 1 admin Master Table




2) business_Master :-

• Table Name : business

• Primary Key : id

• Description : This Table Is Used For business

No
Field Name
Data Type
Constrain
Description
1. 1
bId
Int
Primary Key
bisiness- Primary Key
2. 3
bname
Varchar
Foreign Key
business Name
3. 4
oname
Varchar
-
Owner name
4. 5
City
varchar
Foreign Key
business City
5. 6
State
varchar
Foreign Key
business State
6. 7
country
varchar
-
Business country
7. 8
email
varchar
-
Email address
8. 9
phone
      int
-
Phone number
9. 10
password
varchar
-
 Hashed password
10. 11
datetime
Date-Time
-
Entry date and time
11. 
 status
int
-
Blocked or not

Table 2 business Master Table







3)  Individual Master: -

• Table Name: individual

• Primary Key: Id

• Description: This Table Is Used for individuals.


No
Field Name
Data Type
Constrain
Description
1. 1
iId
Int
Primary Key
individual- Primary Key
2. 3
fname
Varchar
Foreign Key
first Name
3. 4
lname
Varchar
Foreign key
last name
4. 5
City
varchar
Foreign Key
business City
5. 6
State
varchar
Foreign Key
business State
6. 7
country
varchar
-
Business country
7. 8
email
varchar
-
Email address
8. 9
phone
      int
-
Phone number
9. 10
password
varchar
-
 Hashed password
10. 11
datetime
Date-Time
-
Entry date and time
11. 
uname
varchar
Foreign key 
Individual Individualname
12. 
Status 
int
-
Blocked or not



Table 3 Screp Piker Master Table









4) Jobs master :-

• Table Name : jobs

• Primary Key : Category_Id

• Description : This Table Is Used For Category-Master.

No
Field Name
Data Type
Constrain
Description
1
Job Id
Int
Primary Key
Primary Key
2
Job Name
Varchar
-
Name
3
Job type 
Varchar
-
Item
4
Posted by 
int
       
Foreign key 
 business name 
Job poster
5
Posted time
Datetime
-
Date and time of job posting
Table 4 jobs master Table
5) Jobs applied master :-
• Table Name : jobs applied

• Primary Key : Sub-Category_Id

• Description : Thia table will be used to keep record of who applied to which job

No
Field Name
Data Type
Constrain
Description
1
Job Id
Int
Primary Key
Primary key
2
BId
Int
Foreign Key
 Business Individual which posted the job 
3
Iid
int
Foreign key
Id of applicant
4
Datetime 
Date time
-
Date and time
Table 5 jobs applied Table








6) Chat master:-
• Table Name : chat

• Primary Key : chat id

• Description : This Table Is Used For Cart Order-Id


No
Field Name
Data Type
Constrain
Description
1
Chat id
Int
Primary Key
Chat-Id
2
Individual-Id
Int
Foreign Key
Individual who send message
3
Individual id 
Int
Forerign Key
 Individual who received the message
4
Datetime
datetime
-
Date and time of that maeeage 

Table 6 chat Master Table






























7) Post master:-
• Table Name : posts

• Primary Key : post Id

• Description : This Table Is Used For storing links of the posts

No
Field Name
Data Type
Constrain
Description
1
Post Id
Int
Primary Key
Final Order Id
2
Individual-Id
Int
Foreign Key
 Id of uploader
3
likes
Int
-
Number of the likes 
4
Comments 
Int
Foreign Key
Number of comments
5
link
varchar
 -
Location of the actual content
6
views
int

Number of the views
7
datetime
Date-Time

Date and time of creation
8
status
int

Block or not 

Table 7 post Master Table




8) comments:-
• Table Name: comments

• Primary Key: comment id

• Description: This Table Is used for comments on the post


No
Field Name
Data Type
Constrain
Description
1
Comment Id
Int
Primary Key
Comment  Id
2
Post id
Int
Foreign Key
Post on which comment was done
3
uId 
Int
Foreign Key
Individual id of comment maker Individual
4
 status
 int
-
 Comment blocked or not
5
Date time
Date-Time
-
Date and time of comment done


Table 8 comment Master Table



9) report_Master :-

• Table Name : reports

• Primary Key : report_Id

• Description : This Table Is used for keeping records of report


No
Field Name
Data Type
Constrain
Description
1
Report_id
Int
Primary Key
report Id
2
Individual_id
int
Foreign key
Id of Individual who reported on content
3
Report_content
varchar
-
Link of reported content
4
Report_tittle
Varchar 
-
Matter of report
5 
Date time
datetime
-
Date and time of report done



Table 9 report master Table










3.7 System Activity
     Activity diagrams are graphical representations of workflows of stepwise activities and actions with support for choice, iteration and concurrency. In the Unified Modeling Language, activity diagrams can be used to describe the business and operational step-by-step workflows of components in a system. An activity diagram shows the overall flow of control.

3.7.1 Admin Activity


Figure 11 Admin Activity Diagram
















3.7.2 Individual Activity


Figure 12 Individual Activity
















3.7.3 Business Activity

Figure 13 Business Activity









3.7.4 Visitor Activity






Figure 14 Visitor Activity


3.8 Requirement Validation
 Individualname and Password validation that is compulsory to enter within system (Not for visitor).
 Phone No must be Numeric and length is of maximum 12 (It's Cell no, or landline) Digit.
 Name must be character not in digit.
 Start years must be less than or equal to current running year
 Most of the data are enter from the master table so it also reduces the chances of mismatch data, so no multiple entries.
3.9 Function and Behavioral Modeling
     Data Flow Diagrams (DFD) can be used to graphically illustrate the flow of data through a system or model. More generically, Flow Diagrams (or Process Flow Diagrams) can be used to depict the movement and process steps of data, information, people, money, electricity, etc. through a system. The basic concept is a means of showing what goes in (to a system or model), what processes occur (within the system or model) and what comes out. A flow diagram is a graphical means of presenting, describing, or analyzing a process. This is done by drawing small boxes which represent steps or decisions in a chain of steps or decisions. These boxes are connected to other boxes by lines and arrows which represent sequence and dependency relationships (i.e., X must be done before Y can be done). The flow diagram is also known as Flow Chart.
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
3.9.1  
0 Level DFD (Context Level DFD)


Figure 15 0 Level DFD (Context Level DFD)


Business DFD



Figure 16 Business DFD







Individual DFD



Figure 17 Individual DFD



Admin DFD




Figure 19 Admin DFD



Visitor DFD


Figure 20 Visitor DFD


3.10 Implementation Environment
The implementation of website is under the environment of Apache Tomcat as Server.
The dynamic page will be run on all compatible web browsers.
 Front end HTML, CSS, Javascript, Jquery and Bootstrap
 Programming Language PHP
 Back End My SQL server5.5.8
 For Designing 
 For documentation MS Word
 For presentation MS PowerPoint


3.10.1 Security Features
      The security of the system is through the ‗Three Levels of Security". In this feature the highest security level is of the Administrator, who has all the access rights to see all the details. And also have all the insert, update and delete permissions. The second security level is related to the web application security such as checking of Individual's Id and Password and Individuals are registered or not. The lowest security level is given to the Individual who is using this web application online. Individual can manage his/her profile.

3.10.2 Coding Standards
      The coding standard is the well-defined and standard style of coding. With the help of the coding standard any person can go into any code and figure out what's going on and new people can get up to speed quickly. A coding standard sets out standard ways of doing several things such as the way variables are to be named, the code is to be laid out, the comments are to be described, the work of function are to carried out etc.
Variable Declarations
> We have placed the local variable declarations at the beginning of the script
> Block of declarations has aligned
> For multiple declarations We have used new declaration on the next line

Naming Conventions
> The name of variable that I have used in script represents the content or purpose or role of the variable
> Variables are we with the length of seven to eight characters
> Variable names consist of a data type used in it. If it is a string then the prefix of the variable is ‗string" else if integer then ‗int"
> Every script should begin with a comment block, which describes the scripts purpose; any arguments used (if applicable), and return values (if applicable), inputs-outputs, and name of script.
> Comments may also be used in the body of the script to explain individual sections or lines of code.
> It is also used to describe variable definition or declaration.
> Each part of the project has a specific comment layout. e.g. Line comments (//...), block comments (/*....*/) etc.

Programming Conventions
Some general conventions to be followed in programming:


> Statements: Only one statement per line.
> Spacing: Space before and after all operators (such as +, *, <, =, etc.) and the assignment symbol (=).
> Indenting: Improve the readability of script by using tabs to indent the body of statements.
> Also use a tab to indent statements continued onto a new line.
> Indentation/Tabs/Space Policy: 3, 4, or 8 spaces for each level



































</div>
<script>
  function fun1(){
    if(document.getElementById("dim").style.display == "none")
    document.getElementById("dim").style.display = "block";
    else
    document.getElementById("dim").style.display = "none";
  }
  
</script>
</body>
</html>