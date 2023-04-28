type of users

1. admin (can access all type records and staffs)
2. crm (can feed information about request and end user)
3. technician (can modifiy and remarks and update about service request)
4. end-user(customer) (can track and find the details about product)



Schema

1. users records
	id, name, email, contact, status, 

2. request
	id, product_name, brand, type, serial_no, MAC, color, service_code, status, problem, user_id, date_of_creation, last_update, date_of_delivery, delivered_by, technician_id, estimate_delivery_date, remark

3. staffs
	id, name, email, contact, salary, type, status, aadhar, pan, address

4. admin
	id, name, email, password

5. feedback. 
	id, request_id, user_id, content,date_of_creation.


6. status
    0- pending
	1- Confirm
	2- work progress
	3- reject
	4- work done  
	5- delivered

 
