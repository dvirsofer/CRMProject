--------------------------------------------------------
--  File created - Saturday-March-19-2016   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Type BALANCE_TABLE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."BALANCE_TABLE_TYPE" as table of balance_type;

/
--------------------------------------------------------
--  DDL for Type BALANCE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."BALANCE_TYPE" AS OBJECT
   (move_id number,
   move_date date,
   p_id    number,
     description    varchar2(20),
     warehouse_id      number,
     warehouse_name varchar2(100),
     essence varchar2(20),
     quantity number
   )

/
--------------------------------------------------------
--  DDL for Type INVOICE_HEADER_TABLE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."INVOICE_HEADER_TABLE_TYPE" as table of invoice_header_type;

/
--------------------------------------------------------
--  DDL for Type INVOICE_HEADER_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."INVOICE_HEADER_TYPE" AS OBJECT
   ( 	INVOICE_ID NUMBER(10,0), 
   ORDER_ID NUMBER(10,0),
    ORDER_DATE DATE, 
    CUST_ID NUMBER(10,0), 
    FIRST_NAME VARCHAR2(30 BYTE), 
    LAST_NAME VARCHAR2(30 BYTE)
    
   )

/
--------------------------------------------------------
--  DDL for Type INVOICE_ROW_TABLE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."INVOICE_ROW_TABLE_TYPE" as table of invoice_row_type;

/
--------------------------------------------------------
--  DDL for Type INVOICE_ROW_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."INVOICE_ROW_TYPE" AS OBJECT
   ( 	INVOICE_ID NUMBER(10,0), 
     ROW_NUM NUMBER(10,0),
    P_ID NUMBER(10,0), 
    description VARCHAR2(20),
    warehouse_name VARCHAR2(100),
    warehouse_id NUMBER(10,0),
    QUANTITY NUMBER(10,0)
   )

/
--------------------------------------------------------
--  DDL for Type MYCUSTOMER
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."MYCUSTOMER" AS OBJECT
   ( cust_id    number,
     first_name    varchar2(30),
     last_name      varchar2(30)
   )

/
--------------------------------------------------------
--  DDL for Type ORDER_HEADER_TABLE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."ORDER_HEADER_TABLE_TYPE" as table of order_header_type;

/
--------------------------------------------------------
--  DDL for Type ORDER_HEADER_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."ORDER_HEADER_TYPE" AS OBJECT
   ( 	ORDER_ID NUMBER(10,0), 
    ORDER_DATE DATE, 
    CUST_ID NUMBER(10,0), 
    FIRST_NAME VARCHAR2(30 BYTE), 
    LAST_NAME VARCHAR2(30 BYTE), 
    STATUS VARCHAR2(10 BYTE)
    
   )

/
--------------------------------------------------------
--  DDL for Type ORDER_ROW_TABLE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."ORDER_ROW_TABLE_TYPE" as table of order_row_type;

/
--------------------------------------------------------
--  DDL for Type ORDER_ROW_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."ORDER_ROW_TYPE" AS OBJECT
   ( 	ORDER_ID NUMBER(10,0), 
     ROW_NUM NUMBER(10,0),
    P_ID NUMBER(10,0), 
    description VARCHAR2(20),
    warehouse_name VARCHAR2(100),
    warehouse_id NUMBER(10,0),
    QUANTITY NUMBER(10,0)
   )

/
--------------------------------------------------------
--  DDL for Type PRODUCT_TABLE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."PRODUCT_TABLE_TYPE" as table of product_type;

/
--------------------------------------------------------
--  DDL for Type PRODUCT_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."PRODUCT_TYPE" AS OBJECT
   ( p_id    number,
     description    varchar2(20),
     warehouse_id      number,
     warehouse_name varchar2(100),
     quantity number
   )

/
--------------------------------------------------------
--  DDL for Type SALES_TABLE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."SALES_TABLE_TYPE" as table of sales_type;

/
--------------------------------------------------------
--  DDL for Type SALES_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."SALES_TYPE" AS OBJECT
   (p_id    number,
     description    varchar2(20),
     warehouse_id      number,
     warehouse_name varchar2(100),
     quantity number
   )

/
--------------------------------------------------------
--  DDL for Type T_CUSTOMER_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."T_CUSTOMER_TYPE" as table of mycustomer;

/
--------------------------------------------------------
--  DDL for Type WAREHOUSE_TABLE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."WAREHOUSE_TABLE_TYPE" as table of warehouse_type;

/
--------------------------------------------------------
--  DDL for Type WAREHOUSE_TYPE
--------------------------------------------------------

  CREATE OR REPLACE TYPE "HR"."WAREHOUSE_TYPE" AS OBJECT
   ( WAREHOUSE_ID    number,
     WAREHOUSE_NAME    varchar2(100)
   )

/
--------------------------------------------------------
--  DDL for Sequence CUST_ID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HR"."CUST_ID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 218 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence INVOICE_ID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HR"."INVOICE_ID_SEQ"  MINVALUE 0 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 241 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence MOVE_ID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HR"."MOVE_ID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 384 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence ORDER_ID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HR"."ORDER_ID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 370 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence P_ID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HR"."P_ID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 277 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence USERID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HR"."USERID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 41 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence USER_ID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HR"."USER_ID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 103 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence WAREHOUSE_ID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HR"."WAREHOUSE_ID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 23 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Table BALANCE
--------------------------------------------------------

  CREATE TABLE "HR"."BALANCE" 
   (	"MOVE_ID" NUMBER(10,0), 
	"MOVE_DATE" DATE DEFAULT sysdate, 
	"P_ID" NUMBER(10,0), 
	"QUANTITY" NUMBER(10,0), 
	"ESSENCE" VARCHAR2(20 BYTE), 
	"WAREHOUSE_ID" NUMBER(10,2)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table CUSTOMERS
--------------------------------------------------------

  CREATE TABLE "HR"."CUSTOMERS" 
   (	"CUST_ID" NUMBER(10,0), 
	"FIRST_NAME" VARCHAR2(30 BYTE), 
	"LAST_NAME" VARCHAR2(30 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table INVENTORY
--------------------------------------------------------

  CREATE TABLE "HR"."INVENTORY" 
   (	"P_ID" NUMBER(10,0), 
	"QUANTITY" NUMBER(5,0), 
	"WAREHOUSE_ID" NUMBER(10,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table INVOICE_HEADER
--------------------------------------------------------

  CREATE TABLE "HR"."INVOICE_HEADER" 
   (	"INVOICE_ID" NUMBER, 
	"ORDER_ID" NUMBER, 
	"ORDER_DATE" DATE, 
	"CUST_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table INVOICE_ROWS
--------------------------------------------------------

  CREATE TABLE "HR"."INVOICE_ROWS" 
   (	"INVOICE_ID" NUMBER, 
	"ROW_NUM" NUMBER, 
	"P_ID" NUMBER, 
	"QUANTITY" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table ORDERS_HEADER
--------------------------------------------------------

  CREATE TABLE "HR"."ORDERS_HEADER" 
   (	"ORDER_ID" NUMBER(10,0), 
	"ORDER_DATE" DATE DEFAULT sysdate, 
	"CUST_ID" NUMBER(10,0), 
	"STATUS" VARCHAR2(10 BYTE) DEFAULT 'Open'
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table ORDERS_ROWS
--------------------------------------------------------

  CREATE TABLE "HR"."ORDERS_ROWS" 
   (	"ORDER_ID" NUMBER(10,0), 
	"ROW_NUM" NUMBER(10,0), 
	"P_ID" NUMBER(10,0), 
	"QUANTITY" NUMBER(5,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PRODUCTS
--------------------------------------------------------

  CREATE TABLE "HR"."PRODUCTS" 
   (	"P_ID" NUMBER(10,0), 
	"DESCRIPTION" VARCHAR2(20 BYTE), 
	"WAREHOUSE_ID" NUMBER(10,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table WAREHOUSE
--------------------------------------------------------

  CREATE TABLE "HR"."WAREHOUSE" 
   (	"WAREHOUSE_ID" NUMBER(10,0), 
	"WAREHOUSE_NAME" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for View FULL_PRODUCT_INFO_VIEW
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."FULL_PRODUCT_INFO_VIEW" ("P_ID", "DESCRIPTION", "WAREHOUSE_ID", "WAREHOUSE_NAME", "QUANTITY") AS 
  SELECT products.P_ID,
  products.description,
    products.WAREHOUSE_ID ,
    INVENTORY_WITH_WAREHOUSE_VIEW.WAREHOUSE_NAME, 
    INVENTORY_WITH_WAREHOUSE_VIEW.QUANTITY
   
  FROM products
  INNER JOIN INVENTORY_WITH_WAREHOUSE_VIEW
  ON products.p_id=INVENTORY_WITH_WAREHOUSE_VIEW.p_id;
--------------------------------------------------------
--  DDL for View INVENTORY_WITH_WAREHOUSE_VIEW
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."INVENTORY_WITH_WAREHOUSE_VIEW" ("P_ID", "WAREHOUSE_ID", "WAREHOUSE_NAME", "QUANTITY") AS 
  SELECT INVENTORY.P_ID,
  INVENTORY.WAREHOUSE_ID ,
    WAREHOUSE.WAREHOUSE_NAME,
    INVENTORY.QUANTITY
  FROM inventory
  INNER JOIN warehouse
  ON inventory.warehouse_id=warehouse.warehouse_id;
REM INSERTING into HR.BALANCE
SET DEFINE OFF;
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (359,to_date('19/03/2016','DD/MM/RRRR'),257,99,'Credit',1);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (361,to_date('19/03/2016','DD/MM/RRRR'),259,66,'Credit',3);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (362,to_date('19/03/2016','DD/MM/RRRR'),260,77,'Credit',2);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (363,to_date('19/03/2016','DD/MM/RRRR'),261,876,'Credit',2);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (364,to_date('19/03/2016','DD/MM/RRRR'),262,6,'Credit',3);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (365,to_date('19/03/2016','DD/MM/RRRR'),263,67,'Credit',1);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (366,to_date('19/03/2016','DD/MM/RRRR'),257,10,'Debit',1);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (367,to_date('19/03/2016','DD/MM/RRRR'),259,6,'Debit',3);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (368,to_date('19/03/2016','DD/MM/RRRR'),262,4,'Debit',3);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (370,to_date('19/03/2016','DD/MM/RRRR'),257,10,'Credit',1);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (371,to_date('19/03/2016','DD/MM/RRRR'),259,6,'Credit',3);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (372,to_date('19/03/2016','DD/MM/RRRR'),262,4,'Credit',3);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (373,to_date('19/03/2016','DD/MM/RRRR'),257,10,'Debit',1);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (374,to_date('19/03/2016','DD/MM/RRRR'),259,6,'Debit',3);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (375,to_date('19/03/2016','DD/MM/RRRR'),262,4,'Debit',3);
Insert into HR.BALANCE (MOVE_ID,MOVE_DATE,P_ID,QUANTITY,ESSENCE,WAREHOUSE_ID) values (360,to_date('19/03/2016','DD/MM/RRRR'),258,18,'Credit',2);
REM INSERTING into HR.CUSTOMERS
SET DEFINE OFF;
Insert into HR.CUSTOMERS (CUST_ID,FIRST_NAME,LAST_NAME) values (198,'Avishay','Mahluf');
Insert into HR.CUSTOMERS (CUST_ID,FIRST_NAME,LAST_NAME) values (199,'Dvir','Sofer');
REM INSERTING into HR.INVENTORY
SET DEFINE OFF;
Insert into HR.INVENTORY (P_ID,QUANTITY,WAREHOUSE_ID) values (257,89,1);
Insert into HR.INVENTORY (P_ID,QUANTITY,WAREHOUSE_ID) values (259,60,3);
Insert into HR.INVENTORY (P_ID,QUANTITY,WAREHOUSE_ID) values (260,77,2);
Insert into HR.INVENTORY (P_ID,QUANTITY,WAREHOUSE_ID) values (261,876,2);
Insert into HR.INVENTORY (P_ID,QUANTITY,WAREHOUSE_ID) values (262,12,3);
Insert into HR.INVENTORY (P_ID,QUANTITY,WAREHOUSE_ID) values (263,67,1);
Insert into HR.INVENTORY (P_ID,QUANTITY,WAREHOUSE_ID) values (258,18,2);
REM INSERTING into HR.INVOICE_HEADER
SET DEFINE OFF;
Insert into HR.INVOICE_HEADER (INVOICE_ID,ORDER_ID,ORDER_DATE,CUST_ID) values (237,351,to_date('19/03/2016','DD/MM/RRRR'),198);
REM INSERTING into HR.INVOICE_ROWS
SET DEFINE OFF;
Insert into HR.INVOICE_ROWS (INVOICE_ID,ROW_NUM,P_ID,QUANTITY) values (237,3,262,4);
Insert into HR.INVOICE_ROWS (INVOICE_ID,ROW_NUM,P_ID,QUANTITY) values (237,1,257,10);
Insert into HR.INVOICE_ROWS (INVOICE_ID,ROW_NUM,P_ID,QUANTITY) values (237,2,259,6);
REM INSERTING into HR.ORDERS_HEADER
SET DEFINE OFF;
Insert into HR.ORDERS_HEADER (ORDER_ID,ORDER_DATE,CUST_ID,STATUS) values (353,to_date('19/03/2016','DD/MM/RRRR'),199,'Open');
Insert into HR.ORDERS_HEADER (ORDER_ID,ORDER_DATE,CUST_ID,STATUS) values (351,to_date('19/03/2016','DD/MM/RRRR'),198,'Closed');
Insert into HR.ORDERS_HEADER (ORDER_ID,ORDER_DATE,CUST_ID,STATUS) values (352,to_date('19/03/2016','DD/MM/RRRR'),199,'Open');
REM INSERTING into HR.ORDERS_ROWS
SET DEFINE OFF;
Insert into HR.ORDERS_ROWS (ORDER_ID,ROW_NUM,P_ID,QUANTITY) values (351,1,257,10);
Insert into HR.ORDERS_ROWS (ORDER_ID,ROW_NUM,P_ID,QUANTITY) values (351,2,259,6);
Insert into HR.ORDERS_ROWS (ORDER_ID,ROW_NUM,P_ID,QUANTITY) values (351,3,262,4);
Insert into HR.ORDERS_ROWS (ORDER_ID,ROW_NUM,P_ID,QUANTITY) values (352,1,257,21);
Insert into HR.ORDERS_ROWS (ORDER_ID,ROW_NUM,P_ID,QUANTITY) values (352,2,261,44);
Insert into HR.ORDERS_ROWS (ORDER_ID,ROW_NUM,P_ID,QUANTITY) values (353,1,257,24);
Insert into HR.ORDERS_ROWS (ORDER_ID,ROW_NUM,P_ID,QUANTITY) values (353,2,262,2);
REM INSERTING into HR.PRODUCTS
SET DEFINE OFF;
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (252,'asdsa',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (253,'Dvir s',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (254,'Avishay1',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (255,'Avishay2',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (256,'Test',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (257,'Computer',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (259,'TV',3);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (260,'Tablet',2);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (261,'Google Glass',2);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (262,'Charger',3);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (263,'Sony Playstation',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (242,'a',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (250,'b',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (251,'c',1);
Insert into HR.PRODUCTS (P_ID,DESCRIPTION,WAREHOUSE_ID) values (258,'IPhone',2);
REM INSERTING into HR.WAREHOUSE
SET DEFINE OFF;
Insert into HR.WAREHOUSE (WAREHOUSE_ID,WAREHOUSE_NAME) values (1,'a');
Insert into HR.WAREHOUSE (WAREHOUSE_ID,WAREHOUSE_NAME) values (3,'b');
Insert into HR.WAREHOUSE (WAREHOUSE_ID,WAREHOUSE_NAME) values (2,'c');
--------------------------------------------------------
--  DDL for Index INVENTORY_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."INVENTORY_PK" ON "HR"."INVENTORY" ("P_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C007461
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."SYS_C007461" ON "HR"."CUSTOMERS" ("CUST_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index ORDERS_ROWS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."ORDERS_ROWS_PK" ON "HR"."ORDERS_ROWS" ("ORDER_ID", "ROW_NUM") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index PRODUCT_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."PRODUCT_PK" ON "HR"."PRODUCTS" ("P_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index WAREHOUSE_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."WAREHOUSE_PK" ON "HR"."WAREHOUSE" ("WAREHOUSE_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C007473
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."SYS_C007473" ON "HR"."ORDERS_HEADER" ("ORDER_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index INVOICE_ROWS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."INVOICE_ROWS_PK" ON "HR"."INVOICE_ROWS" ("INVOICE_ID", "ROW_NUM") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index INVOICE_HEADER_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."INVOICE_HEADER_PK" ON "HR"."INVOICE_HEADER" ("INVOICE_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index BALANCE_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."BALANCE_PK" ON "HR"."BALANCE" ("MOVE_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  Constraints for Table ORDERS_ROWS
--------------------------------------------------------

  ALTER TABLE "HR"."ORDERS_ROWS" MODIFY ("ORDER_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."ORDERS_ROWS" MODIFY ("ROW_NUM" NOT NULL ENABLE);
  ALTER TABLE "HR"."ORDERS_ROWS" MODIFY ("P_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."ORDERS_ROWS" MODIFY ("QUANTITY" NOT NULL ENABLE);
  ALTER TABLE "HR"."ORDERS_ROWS" ADD CONSTRAINT "ORDERS_ROWS_PK" PRIMARY KEY ("ORDER_ID", "ROW_NUM")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table WAREHOUSE
--------------------------------------------------------

  ALTER TABLE "HR"."WAREHOUSE" ADD CONSTRAINT "WAREHOUSE_PK" PRIMARY KEY ("WAREHOUSE_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "HR"."WAREHOUSE" MODIFY ("WAREHOUSE_NAME" NOT NULL ENABLE);
  ALTER TABLE "HR"."WAREHOUSE" MODIFY ("WAREHOUSE_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table CUSTOMERS
--------------------------------------------------------

  ALTER TABLE "HR"."CUSTOMERS" MODIFY ("FIRST_NAME" NOT NULL ENABLE);
  ALTER TABLE "HR"."CUSTOMERS" MODIFY ("LAST_NAME" NOT NULL ENABLE);
  ALTER TABLE "HR"."CUSTOMERS" ADD PRIMARY KEY ("CUST_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "HR"."CUSTOMERS" ADD CHECK (REGEXP_LIKE(first_name, '^[A-Za-z .-]+$')) ENABLE;
  ALTER TABLE "HR"."CUSTOMERS" ADD CHECK (REGEXP_LIKE(last_name, '^[A-Za-z .-]+$')) ENABLE;
--------------------------------------------------------
--  Constraints for Table INVOICE_HEADER
--------------------------------------------------------

  ALTER TABLE "HR"."INVOICE_HEADER" MODIFY ("INVOICE_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVOICE_HEADER" MODIFY ("ORDER_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVOICE_HEADER" MODIFY ("ORDER_DATE" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVOICE_HEADER" MODIFY ("CUST_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVOICE_HEADER" ADD CONSTRAINT "INVOICE_HEADER_PK" PRIMARY KEY ("INVOICE_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PRODUCTS
--------------------------------------------------------

  ALTER TABLE "HR"."PRODUCTS" MODIFY ("P_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."PRODUCTS" ADD CONSTRAINT "PRODUCT_PK" PRIMARY KEY ("P_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "HR"."PRODUCTS" MODIFY ("WAREHOUSE_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."PRODUCTS" MODIFY ("DESCRIPTION" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table INVENTORY
--------------------------------------------------------

  ALTER TABLE "HR"."INVENTORY" MODIFY ("WAREHOUSE_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVENTORY" MODIFY ("P_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVENTORY" MODIFY ("QUANTITY" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVENTORY" ADD CONSTRAINT "INVENTORY_PK" PRIMARY KEY ("P_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "HR"."INVENTORY" ADD CHECK (quantity >= 10) ENABLE;
--------------------------------------------------------
--  Constraints for Table INVOICE_ROWS
--------------------------------------------------------

  ALTER TABLE "HR"."INVOICE_ROWS" MODIFY ("INVOICE_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVOICE_ROWS" MODIFY ("ROW_NUM" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVOICE_ROWS" MODIFY ("P_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVOICE_ROWS" MODIFY ("QUANTITY" NOT NULL ENABLE);
  ALTER TABLE "HR"."INVOICE_ROWS" ADD CONSTRAINT "INVOICE_ROWS_PK" PRIMARY KEY ("INVOICE_ID", "ROW_NUM")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "HR"."INVOICE_ROWS" ADD CHECK (row_num > 0) ENABLE;
--------------------------------------------------------
--  Constraints for Table BALANCE
--------------------------------------------------------

  ALTER TABLE "HR"."BALANCE" MODIFY ("MOVE_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."BALANCE" MODIFY ("MOVE_DATE" NOT NULL ENABLE);
  ALTER TABLE "HR"."BALANCE" MODIFY ("P_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."BALANCE" MODIFY ("QUANTITY" NOT NULL ENABLE);
  ALTER TABLE "HR"."BALANCE" MODIFY ("ESSENCE" NOT NULL ENABLE);
  ALTER TABLE "HR"."BALANCE" ADD CONSTRAINT "BALANCE_PK" PRIMARY KEY ("MOVE_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "HR"."BALANCE" MODIFY ("WAREHOUSE_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table ORDERS_HEADER
--------------------------------------------------------

  ALTER TABLE "HR"."ORDERS_HEADER" MODIFY ("ORDER_DATE" NOT NULL ENABLE);
  ALTER TABLE "HR"."ORDERS_HEADER" MODIFY ("CUST_ID" NOT NULL ENABLE);
  ALTER TABLE "HR"."ORDERS_HEADER" MODIFY ("STATUS" NOT NULL ENABLE);
  ALTER TABLE "HR"."ORDERS_HEADER" ADD PRIMARY KEY ("ORDER_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "HR"."ORDERS_HEADER" ADD CONSTRAINT "ORDERS_HEADER_CHK1" CHECK (STATUS IN ('Open', 'Closed', 'Canceled')) ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table BALANCE
--------------------------------------------------------

  ALTER TABLE "HR"."BALANCE" ADD CONSTRAINT "BALANCE_FK1" FOREIGN KEY ("WAREHOUSE_ID")
	  REFERENCES "HR"."WAREHOUSE" ("WAREHOUSE_ID") ENABLE;
  ALTER TABLE "HR"."BALANCE" ADD CONSTRAINT "BALANCE_PRODUCTS_FK1" FOREIGN KEY ("P_ID")
	  REFERENCES "HR"."PRODUCTS" ("P_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table INVENTORY
--------------------------------------------------------

  ALTER TABLE "HR"."INVENTORY" ADD CONSTRAINT "INVENTORY_FK1" FOREIGN KEY ("WAREHOUSE_ID")
	  REFERENCES "HR"."WAREHOUSE" ("WAREHOUSE_ID") ENABLE;
  ALTER TABLE "HR"."INVENTORY" ADD CONSTRAINT "INVENTORY_PRODUCTS_FK1" FOREIGN KEY ("P_ID")
	  REFERENCES "HR"."PRODUCTS" ("P_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table INVOICE_HEADER
--------------------------------------------------------

  ALTER TABLE "HR"."INVOICE_HEADER" ADD CONSTRAINT "INVOICE_HEADER_CUSTOMERS_FK1" FOREIGN KEY ("CUST_ID")
	  REFERENCES "HR"."CUSTOMERS" ("CUST_ID") ENABLE;
  ALTER TABLE "HR"."INVOICE_HEADER" ADD CONSTRAINT "INVOICE_HEADER_ORDERS_HEA_FK1" FOREIGN KEY ("ORDER_ID")
	  REFERENCES "HR"."ORDERS_HEADER" ("ORDER_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table INVOICE_ROWS
--------------------------------------------------------

  ALTER TABLE "HR"."INVOICE_ROWS" ADD CONSTRAINT "INVOICE_ROWS_INVOICE_HEAD_FK1" FOREIGN KEY ("INVOICE_ID")
	  REFERENCES "HR"."INVOICE_HEADER" ("INVOICE_ID") ENABLE;
  ALTER TABLE "HR"."INVOICE_ROWS" ADD CONSTRAINT "INVOICE_ROWS_PRODUCTS_FK1" FOREIGN KEY ("P_ID")
	  REFERENCES "HR"."PRODUCTS" ("P_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table ORDERS_HEADER
--------------------------------------------------------

  ALTER TABLE "HR"."ORDERS_HEADER" ADD CONSTRAINT "FK_CUST_COLUMN" FOREIGN KEY ("CUST_ID")
	  REFERENCES "HR"."CUSTOMERS" ("CUST_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table ORDERS_ROWS
--------------------------------------------------------

  ALTER TABLE "HR"."ORDERS_ROWS" ADD CONSTRAINT "FK_ORDER_ID" FOREIGN KEY ("ORDER_ID")
	  REFERENCES "HR"."ORDERS_HEADER" ("ORDER_ID") ENABLE;
  ALTER TABLE "HR"."ORDERS_ROWS" ADD CONSTRAINT "ORDERS_ROWS_PRODUCTS_FK1" FOREIGN KEY ("P_ID")
	  REFERENCES "HR"."PRODUCTS" ("P_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PRODUCTS
--------------------------------------------------------

  ALTER TABLE "HR"."PRODUCTS" ADD CONSTRAINT "PRODUCTS_FK1" FOREIGN KEY ("WAREHOUSE_ID")
	  REFERENCES "HR"."WAREHOUSE" ("WAREHOUSE_ID") ENABLE;
--------------------------------------------------------
--  DDL for Trigger CHECK_QUANTITY
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."CHECK_QUANTITY" 
  BEFORE INSERT OR UPDATE on inventory
  for each row
BEGIN
  if :new.quantity < 10 and :new.quantity >=0  then
  :new.quantity := 10+:new.quantity;
  elsif :new.quantity < 0 and :new.quantity > -10 then
  :new.quantity := 10+ -1*(:new.quantity);
  elsif :new.quantity < -10 then
  :new.quantity := 10;
  end if;
END;
/
ALTER TRIGGER "HR"."CHECK_QUANTITY" ENABLE;
--------------------------------------------------------
--  DDL for Trigger CLOSE_ORDER
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."CLOSE_ORDER" 
  BEFORE INSERT  on invoice_header
  for each row
BEGIN
 update orders_header set status= 'Closed' where order_id= :new.order_id;
 
END;
/
ALTER TRIGGER "HR"."CLOSE_ORDER" ENABLE;
--------------------------------------------------------
--  DDL for Trigger DELETE_INVOICE_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."DELETE_INVOICE_TRG" 
  BEFORE DELETE  on invoice_rows
  for each row
  
  DECLARE
  product_quantity BALANCE.QUANTITY%TYPE;
  cwarehouse_id WAREHOUSE.WAREHOUSE_ID%TYPE;
  new_quantity BALANCE.QUANTITY%TYPE;
  
BEGIN
  
   
  SELECT products.warehouse_id INTO cwarehouse_id FROM products where products.p_id=:old.p_id;
  
 insert into balance (p_id, quantity, essence, warehouse_id) values (:old.p_id, :old.quantity, 'Credit', cwarehouse_id);
 
 SELECT inventory.quantity INTO product_quantity FROM inventory where inventory.p_id=:old.p_id;
 new_quantity := product_quantity + :old.quantity;
 
 update inventory set inventory.quantity = new_quantity  where inventory.p_id= :old.p_id;
 
END;
/
ALTER TRIGGER "HR"."DELETE_INVOICE_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger INVOICE_ROW_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."INVOICE_ROW_TRG" 
  BEFORE INSERT  on invoice_rows
  for each row
  
  DECLARE
  product_quantity BALANCE.QUANTITY%TYPE;
  cwarehouse_id WAREHOUSE.WAREHOUSE_ID%TYPE;
  new_quantity BALANCE.QUANTITY%TYPE;
  
BEGIN
  
   
  SELECT products.warehouse_id INTO cwarehouse_id FROM products where products.p_id=:new.p_id;
  
 insert into balance (p_id, quantity, essence, warehouse_id) values (:new.p_id, :new.quantity, 'Debit', cwarehouse_id);
 
 SELECT inventory.quantity INTO product_quantity FROM inventory where inventory.p_id=:new.p_id;
 new_quantity := product_quantity - :new.quantity;
 
 update inventory set inventory.quantity = new_quantity  where inventory.p_id= :new.p_id;
 
END;
/
ALTER TRIGGER "HR"."INVOICE_ROW_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger OPEN_ORDER
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."OPEN_ORDER" 
  BEFORE DELETE  on invoice_header
  for each row
BEGIN
 update orders_header set status= 'Open' where order_id= :old.order_id;
 
END;
/
ALTER TRIGGER "HR"."OPEN_ORDER" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TRG_CUST_ID
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."TRG_CUST_ID" 
before insert on customers
for each row
begin
select cust_id_seq.nextval
into :new.cust_id
from dual;
end;
/
ALTER TRIGGER "HR"."TRG_CUST_ID" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TRG_INVOICE_ID
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."TRG_INVOICE_ID" 
before insert on invoice_header
for each row
begin
select invoice_id_seq.nextval
into :new.invoice_id
from dual;
end;
/
ALTER TRIGGER "HR"."TRG_INVOICE_ID" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TRG_MOVE_ID
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."TRG_MOVE_ID" 
before insert on BALANCE
for each row
begin
select move_id_seq.nextval
into :new.move_id
from dual;
end;
/
ALTER TRIGGER "HR"."TRG_MOVE_ID" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TRG_ORD_ID
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."TRG_ORD_ID" 
before insert on orders_header
for each row
begin
select order_id_seq.nextval
into :new.order_id
from dual;
end;
/
ALTER TRIGGER "HR"."TRG_ORD_ID" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TRG_P_ID
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."TRG_P_ID" 
before insert on products
for each row
begin
select p_id_seq.nextval
into :new.p_id
from dual;
end;
/
ALTER TRIGGER "HR"."TRG_P_ID" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TRG_WAREHOUSE_ID
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."TRG_WAREHOUSE_ID" 
before insert on warehouse
for each row
begin
select warehouse_id_seq.nextval
into :new.warehouse_id
from dual;
end;
/
ALTER TRIGGER "HR"."TRG_WAREHOUSE_ID" ENABLE;
--------------------------------------------------------
--  DDL for Function GET_BALANCE_BY_DATE
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_BALANCE_BY_DATE" (p_min_row number, p_max_row number, from_date date, to_date date) RETURN balance_table_type PIPELINED IS
v_obj balance_type := balance_type(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
BEGIN
  for p IN (select *
                from (
                      select p.*
                            ,rownum rn
                      from (select balance.*, full_product_info_view.description, full_product_info_view.warehouse_name  from balance
                       INNER JOIN full_product_info_view 
  ON balance.p_id=full_product_info_view.p_id
 where balance.move_date  between from_date and to_date 
 order by move_id desc) p
                     )
               where rn between p_min_row and p_max_row)
LOOP
  v_obj.move_id   := p.move_id;
  v_obj.move_date   := p.move_date;
  v_obj.p_id   := p.p_id;
  v_obj.description   := p.description;
  v_obj.warehouse_id   := p.warehouse_id;
  v_obj.warehouse_name   := p.warehouse_name;
  v_obj.essence   := p.essence;
  v_obj.quantity   := p.quantity;
  
  PIPE ROW (v_obj);
END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_CUSTOMERS
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_CUSTOMERS" (p_min_row number, p_max_row number) RETURN t_customer_type PIPELINED IS
v_obj mycustomer := mycustomer(NULL, NULL, NULL);
BEGIN
  for c IN (select *
                from (
                      select c.*
                            ,rownum rn
                      from (select * from customers order by cust_id) c
                     )
               where rn between p_min_row and p_max_row)
LOOP
  v_obj.cust_id   := c.cust_id;
  v_obj.first_name   := c.first_name;
  v_obj.last_name   := c.last_name;
  
  PIPE ROW (v_obj);
END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_INVOICE_HEADER
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_INVOICE_HEADER" (
    p_order_id NUMBER,
    p_min_row NUMBER,
    p_max_row NUMBER)
  RETURN INVOICE_HEADER_TABLE_TYPE PIPELINED
IS
  v_obj invoice_header_type := invoice_header_type(NULL, NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT INVOICE_HEADER.*, FIRST_NAME, LAST_NAME
      FROM INVOICE_HEADER
      INNER JOIN CUSTOMERS
      ON CUSTOMERS.CUST_ID = INVOICE_HEADER.CUST_ID
      WHERE INVOICE_HEADER.ORDER_ID = p_order_id
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.invoice_id       := p.invoice_id;
    v_obj.order_id       := p.order_id;
    v_obj.order_date     := p.order_date;
    v_obj.cust_id        := p.cust_id;
    v_obj.first_name     := p.first_name;
    v_obj.last_name      := p.last_name;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_INVOICE_ROWS
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_INVOICE_ROWS" (
    p_invoice_id NUMBER,
    p_min_row NUMBER,
    p_max_row NUMBER)
  RETURN INVOICE_ROW_TABLE_TYPE PIPELINED
IS
  v_obj invoice_row_type := invoice_row_type(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (select r.invoice_id, r.row_num, p.p_id, p.description, p.warehouse_name, p.warehouse_id, r.quantity 
from invoice_rows r 
inner join FULL_PRODUCT_INFO_VIEW p 
on r.p_id = p.p_id 
where r.invoice_id = p_invoice_id
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.invoice_id          := p.invoice_id;
    v_obj.row_num           := p.row_num;
    v_obj.p_id              := p.p_id;
    v_obj.description       := p.description;
    v_obj.warehouse_name    := p.warehouse_name;
    v_obj.warehouse_id      := p.warehouse_id;
    v_obj.quantity          := p.quantity;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_LAST_INVOICE
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_LAST_INVOICE" 
   RETURN number
IS
   last_order number;
   cursor c1 is
  select max(invoice_id) as last from invoice_header;

BEGIN
   open c1;
   fetch c1 into last_order;

   if c1%notfound then
      last_order := -1;
   end if;

   close c1;

RETURN last_order;

EXCEPTION
WHEN OTHERS THEN
   raise_application_error(-20001,'An error was encountered - '||SQLCODE||' -ERROR- '||SQLERRM);
END;

/
--------------------------------------------------------
--  DDL for Function GET_LAST_ORDER
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_LAST_ORDER" 
   RETURN number
IS
   last_order number;
   cursor c1 is
  select max(order_id) as last from orders_header;

BEGIN
   open c1;
   fetch c1 into last_order;

   if c1%notfound then
      last_order := -1;
   end if;

   close c1;

RETURN last_order;

EXCEPTION
WHEN OTHERS THEN
   raise_application_error(-20001,'An error was encountered - '||SQLCODE||' -ERROR- '||SQLERRM);
END;

/
--------------------------------------------------------
--  DDL for Function GET_ORDERS_HEADER
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_ORDERS_HEADER" (
    p_order_id NUMBER,
    p_min_row NUMBER,
    p_max_row NUMBER)
  RETURN ORDER_HEADER_TABLE_TYPE PIPELINED
IS
  v_obj order_header_type := order_header_type(NULL, NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT ORDERS_HEADER.*, FIRST_NAME, LAST_NAME
      FROM ORDERS_HEADER
      INNER JOIN CUSTOMERS
      ON CUSTOMERS.CUST_ID = ORDERS_HEADER.CUST_ID
      WHERE ORDERS_HEADER.ORDER_ID = p_order_id
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.order_id       := p.order_id;
    v_obj.order_date     := p.order_date;
    v_obj.cust_id        := p.cust_id;
    v_obj.first_name     := p.first_name;
    v_obj.last_name      := p.last_name;
    v_obj.status         := p.status;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_ORDERS_HEADERS
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_ORDERS_HEADERS" (
    p_min_row NUMBER,
    p_max_row NUMBER)
  RETURN ORDER_HEADER_TABLE_TYPE PIPELINED
IS
  v_obj order_header_type := order_header_type(NULL, NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT ORDERS_HEADER.*, FIRST_NAME, LAST_NAME
      FROM ORDERS_HEADER
      INNER JOIN CUSTOMERS
      ON CUSTOMERS.CUST_ID = ORDERS_HEADER.CUST_ID
      order by ORDERS_HEADER.ORDER_ID desc
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.order_id       := p.order_id;
    v_obj.order_date     := p.order_date;
    v_obj.cust_id        := p.cust_id;
    v_obj.first_name     := p.first_name;
    v_obj.last_name      := p.last_name;
    v_obj.status         := p.status;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_ORDERS_HEADERS_FILTER_DATE
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_ORDERS_HEADERS_FILTER_DATE" (
    p_min_row NUMBER,
    p_max_row NUMBER,
    from_date date,
    to_date date)
  RETURN ORDER_HEADER_TABLE_TYPE PIPELINED
IS
  v_obj order_header_type := order_header_type(NULL, NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT ORDERS_HEADER.*, FIRST_NAME, LAST_NAME
      FROM ORDERS_HEADER
      INNER JOIN CUSTOMERS
      ON CUSTOMERS.CUST_ID = ORDERS_HEADER.CUST_ID
      where orders_header.order_date between from_date and to_date
      order by ORDERS_HEADER.ORDER_ID desc
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.order_id       := p.order_id;
    v_obj.order_date     := p.order_date;
    v_obj.cust_id        := p.cust_id;
    v_obj.first_name     := p.first_name;
    v_obj.last_name      := p.last_name;
    v_obj.status         := p.status;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_ORDER_ROWS
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_ORDER_ROWS" (
    p_order_id NUMBER,
    p_min_row NUMBER,
    p_max_row NUMBER)
  RETURN ORDER_ROW_TABLE_TYPE PIPELINED
IS
  v_obj order_row_type := order_row_type(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (select r.order_id, r.row_num, p.p_id, p.description, p.warehouse_name, p.warehouse_id, r.quantity 
from orders_rows r 
inner join FULL_PRODUCT_INFO_VIEW p 
on r.p_id = p.p_id 
where r.order_id = p_order_id
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.order_id          := p.order_id;
    v_obj.row_num           := p.row_num;
    v_obj.p_id              := p.p_id;
    v_obj.description       := p.description;
    v_obj.warehouse_name    := p.warehouse_name;
    v_obj.warehouse_id      := p.warehouse_id;
    v_obj.quantity          := p.quantity;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_PRODUCTS
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_PRODUCTS" (
    p_min_row NUMBER,
    p_max_row NUMBER)
  RETURN PRODUCT_TABLE_TYPE PIPELINED
IS
  v_obj product_type := product_type(NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT *
      FROM FULL_PRODUCT_INFO_VIEW
      ORDER BY p_id desc
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.p_id           := p.p_id;
    v_obj.description    := p.description;
    v_obj.warehouse_id   := p.warehouse_id;
    v_obj.warehouse_name := p.warehouse_name;
    v_obj.quantity       := p.quantity;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_PRODUCTS_ASC
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_PRODUCTS_ASC" (
    p_min_row NUMBER,
    p_max_row NUMBER,
    sort_info VARCHAR2)
  RETURN PRODUCT_TABLE_TYPE PIPELINED
IS
  v_obj product_type := product_type(NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT *
      FROM FULL_PRODUCT_INFO_VIEW
        ORDER BY DECODE(sort_info, 'quantity', quantity, 
                                   'warehouse_id', warehouse_id, 
                                    p_id) asc
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.p_id           := p.p_id;
    v_obj.description    := p.description;
    v_obj.warehouse_id   := p.warehouse_id;
    v_obj.warehouse_name := p.warehouse_name;
    v_obj.quantity       := p.quantity;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_PRODUCTS_DESC
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_PRODUCTS_DESC" (
    p_min_row NUMBER,
    p_max_row NUMBER,
    sort_info VARCHAR2)
  RETURN PRODUCT_TABLE_TYPE PIPELINED
IS
  v_obj product_type := product_type(NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT *
      FROM FULL_PRODUCT_INFO_VIEW
        ORDER BY DECODE(sort_info, 'quantity', quantity, 
                                   'warehouse_id', warehouse_id, 
                                    p_id) desc
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.p_id           := p.p_id;
    v_obj.description    := p.description;
    v_obj.warehouse_id   := p.warehouse_id;
    v_obj.warehouse_name := p.warehouse_name;
    v_obj.quantity       := p.quantity;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_PRODUCT_BY_ID
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_PRODUCT_BY_ID" (
  product_id in number)
  RETURN PRODUCT_TABLE_TYPE PIPELINED
IS
  v_obj product_type := product_type(NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
      (SELECT *
      FROM FULL_PRODUCT_INFO_VIEW
      where P_ID = product_id
      ) p
    )
  LOOP
    v_obj.p_id           := p.p_id;
    v_obj.description    := p.description;
    v_obj.warehouse_id   := p.warehouse_id;
    v_obj.warehouse_name := p.warehouse_name;
    v_obj.quantity       := p.quantity;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_SALES_PRODUCTS
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_SALES_PRODUCTS" (p_min_row number, p_max_row number) RETURN sales_table_type PIPELINED IS
v_obj sales_type := sales_type(NULL, NULL, NULL, NULL, NULL);
BEGIN
  for p IN (select *
                from (
                      select p.*
                            ,rownum rn
                      from (select balance.p_id, balance.warehouse_id, 
                      full_product_info_view.description, 
                      full_product_info_view.warehouse_name, 
                      sum(balance.quantity) as quantity
                      from balance
                      inner join full_product_info_view
                      on balance.p_id=full_product_info_view.p_id
                      where balance.essence='Debit'
                      group by balance.p_id, full_product_info_view.DESCRIPTION, 
                      balance.WAREHOUSE_ID, 
                      full_product_info_view.WAREHOUSE_NAME) p
                     )
               where rn between p_min_row and p_max_row)
LOOP
  v_obj.p_id   := p.p_id;
  v_obj.description   := p.description;
  v_obj.warehouse_id   := p.warehouse_id;
  v_obj.warehouse_name   := p.warehouse_name;
  v_obj.quantity   := p.quantity;
  
  PIPE ROW (v_obj);
END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_WAREHOUSE
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_WAREHOUSE" (p_min_row number, p_max_row number) RETURN warehouse_table_type PIPELINED IS
v_obj warehouse_type := warehouse_type(NULL, NULL);
BEGIN
  for p IN (select *
                from (
                      select p.*
                            ,rownum rn
                      from (select * from warehouse order by warehouse_id) p
                     )
               where rn between p_min_row and p_max_row)
LOOP
  v_obj.warehouse_id   := p.warehouse_id;
  v_obj.warehouse_name   := p.warehouse_name;
  
  PIPE ROW (v_obj);
END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_WAREHOUSE_INVENTORY_ASC
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_WAREHOUSE_INVENTORY_ASC" (
    p_min_row NUMBER,
    p_max_row NUMBER,
    sort_info VARCHAR2,
    w_id NUMBER)
  RETURN PRODUCT_TABLE_TYPE PIPELINED
IS
  v_obj product_type := product_type(NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT *
      FROM FULL_PRODUCT_INFO_VIEW
      WHERE w_id=full_product_info_view.warehouse_id
        ORDER BY DECODE(sort_info, 'quantity', quantity, 
                                   'warehouse_id', warehouse_id,
                                   p_id) asc
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.p_id           := p.p_id;
    v_obj.description    := p.description;
    v_obj.warehouse_id   := p.warehouse_id;
    v_obj.warehouse_name := p.warehouse_name;
    v_obj.quantity       := p.quantity;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Function GET_WAREHOUSE_INVENTORY_DESC
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_WAREHOUSE_INVENTORY_DESC" (
    p_min_row NUMBER,
    p_max_row NUMBER,
    sort_info VARCHAR2,
    w_id NUMBER)
  RETURN PRODUCT_TABLE_TYPE PIPELINED
IS
  v_obj product_type := product_type(NULL, NULL, NULL, NULL, NULL);
BEGIN
  FOR p  IN
  (SELECT *
  FROM
    (SELECT p.* ,
      rownum rn
    FROM
      (SELECT *
      FROM FULL_PRODUCT_INFO_VIEW
      WHERE w_id=full_product_info_view.warehouse_id
        ORDER BY DECODE(sort_info, 'quantity', quantity, 
                                   'warehouse_id', warehouse_id,
                                   p_id) desc
      ) p
    )
  WHERE rn BETWEEN p_min_row AND p_max_row
  )
  LOOP
    v_obj.p_id           := p.p_id;
    v_obj.description    := p.description;
    v_obj.warehouse_id   := p.warehouse_id;
    v_obj.warehouse_name := p.warehouse_name;
    v_obj.quantity       := p.quantity;
    PIPE ROW (v_obj);
  END LOOP;
RETURN;
END;

/
--------------------------------------------------------
--  DDL for Procedure DELETE_INVOICE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."DELETE_INVOICE" (cinvoice_id NUMBER)
IS
BEGIN
  delete from invoice_rows where (invoice_id = cinvoice_id);
   delete from invoice_header where (invoice_id = cinvoice_id);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure DELETE_ORDER_ROW
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."DELETE_ORDER_ROW" (corder_id NUMBER)
IS
BEGIN
  delete from orders_rows where (order_id = corder_id);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_BALANCE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_BALANCE" (cp_id NUMBER, cquantity NUMBER, cessence VARCHAR2, cwarehouse_id NUMBER)
IS
BEGIN
  insert into balance (p_id, quantity, essence, warehouse_id) values (cp_id, cquantity, cessence, cwarehouse_id);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_CUSTOMER
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_CUSTOMER" (cfirst_name VARCHAR2, clast_name VARCHAR2)
IS
BEGIN
        insert into customers(FIRST_NAME, LAST_NAME) 
        values (cfirst_name, clast_name);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_INVENTORY
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_INVENTORY" (cp_id NUMBER, cquantity NUMBER, cwarehouse_id NUMBER)
IS
BEGIN
  merge into inventory d using
    (select cp_id p_id, cquantity quantity, cwarehouse_id warehouse_id from dual) s ON (d.p_id = s.p_id) 
    WHEN MATCHED THEN UPDATE SET d.quantity = s.quantity, d.warehouse_id = s.warehouse_id
    WHEN NOT MATCHED THEN INSERT (p_id, quantity, warehouse_id) VALUES (s.p_id, s.quantity, s.warehouse_id);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_INVOICE_HEADER
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_INVOICE_HEADER" (corder_id NUMBER, corder_date DATE, ccust_id NUMBER)
IS
BEGIN
        insert into invoice_header(order_id, order_date, cust_id) 
        values (corder_id, corder_date, ccust_id);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_INVOICE_ROW
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_INVOICE_ROW" (cinvoice_id NUMBER, crow_num NUMBER, cp_id NUMBER, cquantity NUMBER)
IS
BEGIN
        insert into invoice_rows(invoice_id, row_num, p_id, quantity) 
        values (cinvoice_id, crow_num, cp_id, cquantity);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_ORDER_HEADER
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_ORDER_HEADER" (ccust_id NUMBER, cstatus VARCHAR2)
IS
BEGIN
  insert into orders_header(CUST_ID, STATUS) values ( ccust_id, cstatus);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_ORDER_ROW
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_ORDER_ROW" (corder_id NUMBER, crow_num NUMBER, cp_id NUMBER, cquantity NUMBER)
IS
BEGIN
  insert into orders_rows(ORDER_ID, ROW_NUM, P_ID, QUANTITY) values (corder_id, crow_num, cp_id, cquantity);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_PRODUCT
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_PRODUCT" (
    cdesc         VARCHAR2,
    cwarehouse_id NUMBER,
    quantity      NUMBER)
IS  
    cp_id PRODUCTS.P_ID%TYPE;
BEGIN
    
    INSERT
    INTO products
      (
        description,
        warehouse_id
      )
      VALUES
      (
        cdesc,
        cwarehouse_id
      );
    SELECT P_ID_SEQ.currval INTO cp_id FROM dual;
    insert_inventory(cp_id, quantity, cwarehouse_id);
    insert_balance(cp_id, quantity, 'Credit', cwarehouse_id);
END;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_WAREHOUSE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."INSERT_WAREHOUSE" (warehouse_name VARCHAR2)
IS
BEGIN
  INSERT INTO warehouse (warehouse_name) VALUES (warehouse_name);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure RESET_SEQ
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."RESET_SEQ" ( p_seq_name in varchar2 )
is
    l_val number;
begin
    execute immediate
    'select ' || p_seq_name || '.nextval from dual' INTO l_val;

    execute immediate
    'alter sequence ' || p_seq_name || ' increment by -' || l_val || 
                                                          ' minvalue 0';

    execute immediate
    'select ' || p_seq_name || '.nextval from dual' INTO l_val;

    execute immediate
    'alter sequence ' || p_seq_name || ' increment by 1 minvalue 0';
end;

/
--------------------------------------------------------
--  DDL for Procedure UPDATE_BALANCE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."UPDATE_BALANCE" (cp_id NUMBER, cquantity NUMBER, cessence VARCHAR2, cwarehouse_id NUMBER)
IS
BEGIN
  update balance set balance.quantity = cquantity, balance.essence = cessence, balance.warehouse_id = cwarehouse_id  where balance.p_id= cp_id;
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure UPDATE_INVENTORY
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."UPDATE_INVENTORY" (cp_id NUMBER, cquantity NUMBER, cwarehouse_id NUMBER)
IS
BEGIN
  update inventory set inventory.quantity = cquantity, inventory.warehouse_id = cwarehouse_id  where inventory.p_id= cp_id;
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure UPDATE_ORDER_ROW_QUANTITY
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."UPDATE_ORDER_ROW_QUANTITY" (corder_id NUMBER, crow_num NUMBER, cquantity NUMBER)
IS
BEGIN
  update orders_rows set quantity = cquantity where (row_num = crow_num and order_id = corder_id);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure UPDATE_PRODUCT
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."UPDATE_PRODUCT" (pid NUMBER,
    cdesc         VARCHAR2,
    cwarehouse_id NUMBER,
    quantity      NUMBER)
IS  
    product_quantity BALANCE.QUANTITY%TYPE;
    new_quantity BALANCE.QUANTITY%TYPE;
    
BEGIN

    SELECT inventory.quantity INTO product_quantity FROM inventory where inventory.p_id=pid;
    
    update products set products.description = cdesc  where products.p_id= pid;
    update_inventory(pid, quantity, cwarehouse_id);
    if(product_quantity < quantity) then
        new_quantity := quantity - product_quantity;
        update_inventory(pid, quantity, cwarehouse_id);
        insert_balance(pid, new_quantity, 'Credit', cwarehouse_id);
    elsif(product_quantity > quantity) then
        new_quantity := product_quantity - quantity;
        update_inventory(pid, quantity, cwarehouse_id);
        insert_balance(pid, new_quantity, 'Debit', cwarehouse_id);
    end if;
    
END;

/
--------------------------------------------------------
--  DDL for Procedure UPDATE_QUANTITY
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."UPDATE_QUANTITY" (cp_id NUMBER, cquantity NUMBER)
IS
BEGIN
  update inventory set quantity = cquantity where (p_id = cp_id);
  COMMIT;
END;

/
--------------------------------------------------------
--  DDL for Procedure UPDATE_STATUS
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."UPDATE_STATUS" (corder_id NUMBER, cstatus VARCHAR2)
IS
BEGIN
  update orders_header set status= cstatus where order_id= corder_id;
COMMIT;
END;

/
