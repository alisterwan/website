CREATE TRIGGER trig_quantity
BEFORE INSERT ON orders
FOR EACH ROW 
EXECUTE PROCEDURE dec_quantity();

CREATE FUNCTION dec_quantity() RETURNS trigger 
AS $$ 
DECLARE tablename varchar;
BEGIN
SELECT INTO tablename type FROM orders WHERE id_product:=NEW.id_product;
SELECT quantity FROM tablename WHERE id=NEW.id_product;
IF quantity ISNULL THEN NEW.quantity:=0;
END IF;
NEW.quantity:=quantity-1;
RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER gen_customer_num
BEFORE INSERT ON customers
FOR EACH ROW 
EXECUTE PROCEDURE gen_customer_key();

CREATE FUNCTION gen_customer_key() RETURNS TRIGGER 
AS $$
DECLARE numcust integer;
BEGIN
SELECT INTO numcust max(id_customer) FROM customers;
IF numcust ISNULL THEN
numcust:= 0;
END IF;
NEW.id_customer:=numcust+1;
RETURN NEW;
END;
$$ LANGUAGE plpgsql; 
