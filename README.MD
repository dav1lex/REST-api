to use it, you will need <br>
1-XAMP<br>
2- A database called 'transactions'<br>
    a table called 'transactions'<br>
        inside table:<br>
            * id // int not null primary key<br>
            * order_id // int not null unique key<br>
            * amount // decimal not null<br>
            * response_code // int not null<br>
            * response_desc // varchar not null<br>
