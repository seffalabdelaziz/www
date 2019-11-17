Upgrade version 5.0 to version 6.0


/*** BEFORE TAKE BACKUP YOUR OLD FILE & DATABASE ***/



You have take 5 folders downloading new version 6.0

1. app ( digitkart_v6.0/local/app )

2. config ( digitkart_v6.0/local/config )

3. images ( digitkart_v6.0/local/images )

4. resources ( digitkart_v6.0/local/resources )

5. routes ( digitkart_v6.0/local/routes )


and replace that 5 folders on your old site same path.



Then just import three tables : 


1. avig_translate.sql ( this table already there on your database so you can just download and replace this table)

2. country.sql

3. product_report.sql



and just add one column for (product_orders,product_refund) 2 tables check this video :



https://www.youtube.com/watch?v=VRStHwzUGlE



note : import three tables(avig_translate.sql,country.sql,product_report.sql) inside the folders please check it





