<%@ Page Language="C#" AutoEventWireup="true" CodeFile="car_designe.aspx.cs" Inherits="car_designe" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        .auto-style1 {
            width: 1000px;
        }
        .auto-style2 {
            width: 1000px;
            height: 250px;
            background-image: url('layout/images/baner.jpg');
            background-repeat :no-repeat;
        }
        #navd{
            background-image: url('layout/images/footer.gif');
            background-repeat :repeat-x;
        }
        #fnavd{
            background-image: url('layout/images/footer1.gif');
            background-repeat :repeat-x;
        }
        .auto-style3 {
            width: 1000px;
            height: 40px;
        }
        .auto-style4 {
            width: 1000px;
            height: 840px;
        }
        .auto-style5 {
            width: 1000px;
            height: 100px;
        }
        .auto-style6 {
            width: 1000px;
            height: 30px;
        }
        .auto-style8 {
            width: 250px;
        }
        .auto-style9 {}
        .auto-style10 {}
        .auto-style11 {
            height: 341px;
            width: 250px;
        }
        .auto-style12 {
            width: 270px;
        }
        .auto-style13 {
            width: 725px;
            height: 100px;
        }
        .auto-style17 {
            width: 740px;
            height: 680px;
        }
        .auto-style18 {
            width: 200px;
            height: 111px;
        }
        </style>
</head>
<body background="layout/images/backbody.gif">
    <form id="form1" runat="server">
    <div>
    
        <table align="center" cellpadding="0" cellspacing="0" class="auto-style1">
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" class="auto-style2">
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <table style="background-image: images/backbody.gif" id="navd" align="center" aria-disabled="False" aria-hidden="False" cellpadding="0" cellspacing="0" class="auto-style3">
                        <tr>
                            <td width="125" style=" color:#fff; border: 2px solid #fff; text-align:center" >Home</td>
                             <td width="125" style=" color:#fff; border: 2px solid #fff; text-align:center" >Gallery</td>
                             <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Pricinng</td>
                             <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Our Services</td>
                            <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Inquiry</td>
                            <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Booking</td>
                            <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Contact Us</td>
                            <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >About Us</td>


                           
                        </tr>
                    </table>
                    <table align="center" cellpadding="0" cellspacing="0" class="auto-style4">
                        <tr>
                            <td style="background-image: url('layout/images/grey005.jpg')" valign="top" class="auto-style12">
                                <table align="center" cellpadding="0" cellspacing="0" class="auto-style8">
                                    <tr>
                                        <td align="center" style="background-image: url('layout/images/login.gif'); color: #FFFFFF; font-size: 25px; font-weight: 900; font-style: normal; text-transform: capitalize" class="auto-style8">LOGIN HERE:-</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="Black" style="color: #fff;" class="auto-style11">&nbsp;<br />
                                              &nbsp;&nbsp; Username:<asp:TextBox ID="TextBox1" runat="server" CssClass="auto-style9" Width="117px"></asp:TextBox>
                                              &nbsp;<br />
                                              &nbsp;&nbsp; Password:<asp:TextBox ID="TextBox2" runat="server" CssClass="auto-style10" Width="116px"></asp:TextBox>
                                            <br />
                                            <br />
                                            <center style="color: blue;">
                                            <asp:Button ID="Button1" runat="server" Text="LOGIN" />
                                                <br />
                                                <br />
                                               <u><p style="color: #fff;"> New User? Sign Up</p>
                                                <p style="color: #fff;"> &nbsp;</p>
                                                </u>
                                                <p>Forgot Password</p></center>
                                            <br />
                                        </td>
                                    </tr>
                                        </td>
                                        <br />
                                        <br />
                                    <tr>
                                        <td align="center" style="background-image: url('layout/images/login.gif'); color: #FFFFFF; font-size: 25px; font-weight: 900; font-style: normal; text-transform: capitalize" class="auto-style8">NEWS EVENTS:-</td>
                                    </tr>
                                    <tr>
                                        <td class="auto-style8" height="250px" style="background-position: center center; background-image: url('layout/NewsAd/sport04.jpg'); background-repeat: no-repeat;">&nbsp;</td>
                                    </tr>
                                    <tr>
<td align="center" style="background-image: url('layout/images/login.gif'); color: #FFFFFF; font-size: 25px; font-weight: 900; font-style: normal; text-transform: capitalize" class="auto-style8">New Cars:-</td>                                    </tr>
                                    <tr>
                                        <td class="auto-style8" height="250px" style="background-position: center center; background-image: url('layout/Car.jpg'); background-repeat: no-repeat;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                            <td width="730" bgcolor="White" valign="top">
                                <table align="center" cellpadding="0" cellspacing="0" class="auto-style13">
                                    <tr>
                                        <td>&nbsp;&nbsp
                                            
                                            <marquee>
                                            <img alt="" class="auto-style14" src="layout/cars/1.gif" /><img alt="" class="auto-style14" src="layout/cars/10.gif" /><img alt=" " class="auto-style14" src="layout/cars/2.gif" /><img alt="" class="auto-style14" src="layout/cars/3.gif" /><img alt="" class="auto-style14" src="layout/cars/3.jpg" /><img alt="" class="auto-style14" src="layout/cars/4.jpg" /><img alt="" class="auto-style14" src="layout/cars/5.jpg" /><img alt="" class="auto-style15" src="layout/cars/6.jpg" /><img alt="" class="auto-style14" src="layout/cars/7.gif" /><img alt="" class="auto-style14" src="layout/cars/8.gif" /><img alt="" class="auto-style16" src="layout/cars/9.jpg" />
                                            </marquee>



                                        </td>
                                    </tr>
                                </table>


                                <li>SUV CAR</li>
                                <table align="center" cellpadding="0" cellspacing="0" class="auto-style17">
                                    <tr>
                                        <td style="color:red;" height="125" valign="top" width="380" align="center">toyota car<br />
                                             <br />
                                             1x3</td><td style="color:red;" height="125" valign="top" width="380" align="center">
                                             <img alt="" class="auto-style18" src="layout/ourscars/45.jpg" /></td><td style="color:red;" height="125" valign="top" width="380" align="center">toyota car<br />
                                             <br />
                                             1x3</td><td style="color:red;" height="125" valign="top" width="380" align="center">
                                            <img alt="" class="auto-style18" src="layout/ourscars/car_on_monthly_rent.jpg" /></td>
                                    </tr>
                                     <tr>
                                         <td style="color:red;" height="125" valign="top" width="380" align="center">toyota car<br />
                                             <br />
                                             1x3</td><td style="color:red;" height="125" valign="top" width="380" align="center">
                                             <img alt="" class="auto-style18" src="layout/ourscars/car_rental_bhavnagar.jpg" /></td><td style="color:red;" height="125" valign="top" width="380" align="center">toyota car<br />
                                             <br />
                                             1x3</td>
                                    </tr>
                                        <tr>
                                        <td style="color:red;" height="125" valign="top" width="380" align="center">toyota car<br />
                                             <br />
                                             1x3</td><td style="color:red;" height="125" valign="top" width="380" align="center">
                                             <img alt="" class="auto-style18" src="layout/ourscars/45.jpg" /></td><td style="color:red;" height="125" valign="top" width="380" align="center">toyota car<br />
                                             <br />
                                             1x3</td><td style="color:red;" height="125" valign="top" width="380" align="center">
                                            <img alt="" class="auto-style18" src="layout/ourscars/car_on_monthly_rent.jpg" /></td>
                                    </tr>
                                     <tr>
                                         <td style="color:red;" height="125" valign="top" width="380" align="center">toyota car<br />
                                             <br />
                                             1x3</td><td style="color:red;" height="125" valign="top" width="380" align="center">
                                             <img alt="" class="auto-style18" src="layout/ourscars/car_rental_bhavnagar.jpg" /></td><td style="color:red;" height="125" valign="top" width="380" align="center">toyota car<br />
                                             <br />
                                             1x3</td>
                                    </tr>
                                    </table>
                            </td>
                        </tr>
                    </table>
                    <table align="center" cellpadding="0" cellspacing="0" class="auto-style5">
                        <tr>
                            <td>
                                <table id="fnavd" align="center" cellpadding="0" cellspacing="0" class="auto-style6">
                                    <tr>
                                       <td width="125" style=" color:#fff; border: 2px solid #fff; text-align:center" >Home</td>
                             <td width="125" style=" color:#fff; border: 2px solid #fff; text-align:center" >Gallery</td>
                             <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Pricinng</td>
                             <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Our Services</td>
                            <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Inquiry</td>
                            <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Booking</td>
                            <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >Contact Us</td>
                            <td width="125" style="color:#fff; border: 2px solid #fff; text-align:center" >About Us</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center; color:#fff; background-image: url('layout/images/footer5.gif')">COPYRIGHT &copy SHREE DEPPLE TOURS AND TRAVELS ALL RIGHTS RESERVED</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; color:#fff; background-image: url('layout/images/footer5.gif')">DESIGNED AND MAINTAINED BY <span style="color:red;font-weight:900;">DEVANG GANDHI</span></td>
                        </tr>
                    </table>
                    <br />
                </td>
            </tr>
        </table>
    
    </div>
    </form>
</body>
</html>
