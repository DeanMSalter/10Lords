# 10Lords
Landlord and Tenant Housing communication app
 
Demo video - https://youtu.be/7VQlzWquhxU



Description  
This project is about helping tenants connect more freely and efficiently with landlords or estate agents. Currently the endless options of communication can leave both parties confused or feeling like they have not been heard properly or ignored when important information is exchanged. The information itself can get lost via email or forgotten to be written down in a more formal way from phone conversations. This application aims to bring together all communication into one environment.

Brief overview of Functions    
-Upload photos/document  
-Add tenant/landlord to chat too  
-Connect through chat  
-Personalise profile  
-Property management  
  
Installation guide  
Device  
PC, Laptop  
operating system   
Any OS that supports the use of a web browser, Windows, Linux, Mac, Ubuntu..  
You must have access to the internet  
Visit the web application via the link http://10lords.com/ using a web browser, google chrome is strongly recommended.  
Device  
Mobile, Tablet  
operating system  
Any OS that supports the use of a web browser, Andriod, Apple..  
You must have access to the internet  
Visit the web application via the link http://10lords.com/ using a web browser, Safari or Chrome is recommended.  
  
Installation steps  
1. Go to http://10lords.com/
2. Use the Register Here link and enter your details to sign up and click submit
3. You will then be directed to your homepage and almost ready to use the web application
4. Click sign out and register another user, a tenant if you already have a landlord account or vice versa
  

Test guide  
Download Helium and paste in this code.  
start_chrome()  
go_to("10lords.com")  
click("Register Here")  
write("Jim", into="First Name")  
write("smith", into="Last Name")  
write("test@testing101.com", into="email")  
write("testing", into="Password")  
write("testing", into="Confirm Password")  
click("Submit")  
  
write("test@testing101.com", into="email")  
write("testing", into="Password")  
click(Button("Login"))  
click(Button("Sign Out"))  
click(Button("Tenant Sign in"))  
click(Button("Sign up now"))  
write("Jim", into="First Name")  
write("Tenant", into="Last Name")  
write("test@testing101.com", into="email")  
write("testing", into="Password")  
write("testing", into="Confirm Password")  
click("Submit")  
write("test@testing101.com", into="email")  
write("testing", into="Password")  
click(Button("Login"))  
  
click("Sign Out")  
click(Button("Landlord Sign in"))  
write("test@testing101.com", into="email")  
write("testing", into="Password")  
  
click("Reset Password")  
write("newpass", into="New Password")  
write("newpass", into="Confirm Password")  
click(Button("Submit"))  
  
click("Property management")  
write("12 address")  
click(Button("Add"))  
click("12 address")  
click(Button("Add tenant")  
click("[add]")  
  
write("Event1", into="event name")  
write("new event", into="event details")  
click(Button("Add event"))  
  
go_to("http://localhost/10lords/app/chat.php")                                                                                    click("12 address")                                                                                                              write("test message",into="Your message")  
click("send")  


#Upload use cases cannot be tested automatically ,   
#due to the files not being present on all machines   
#that will run the tests  
 
