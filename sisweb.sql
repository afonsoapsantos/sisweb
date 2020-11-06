--
-- PostgreSQL database dump
--
--Comando docker para usar postgreSQL
-- docker run --name postgreSQL --network=postgres-network -e "POSTGRES_PASSWORD=ASO97dpi9vb" -p 5432:5432 -v /home/afonso/PostgreSQL:/var/lib/postgresql/data -d postgres

-- Dumped from database version 11.5
-- Dumped by pg_dump version 12.0

-- Started on 2019-11-05 11:41:43

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE sisweb;
--
-- TOC entry 3023 (class 1262 OID 24576)
-- Name: sisweb; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE sisweb WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';


ALTER DATABASE sisweb OWNER TO postgres;

\connect sisweb

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3024 (class 0 OID 0)
-- Dependencies: 3023
-- Name: DATABASE sisweb; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE sisweb IS 'Base de dados do sistema web agricola';


--
-- TOC entry 227 (class 1255 OID 24577)
-- Name: fget_last_id(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.fget_last_id() RETURNS integer
    LANGUAGE sql
    AS $$
	SELECT MAX(iduser) FROM tb_users;
$$;


ALTER FUNCTION public.fget_last_id() OWNER TO postgres;

--
-- TOC entry 228 (class 1255 OID 24578)
-- Name: sp_tb_users_insert(character varying, character varying, character varying, integer, date); Type: PROCEDURE; Schema: public; Owner: postgres
--

CREATE PROCEDURE public.sp_tb_users_insert(ptxlogin character varying, ptxpassword character varying, pstatususer character varying, pusertype integer, pdtregisteruser date)
    LANGUAGE sql
    AS $$

	INSERT INTO tb_users(txlogin, txpassword, txstatususer, usertype, dtregisteruser) VALUES(ptxlogin, ptxpassword, pstatususer, pusertype, pdtregisteruser);
    
    SELECT * FROM tb_users WHERE iduser = fget_last_id();

$$;


ALTER PROCEDURE public.sp_tb_users_insert(ptxlogin character varying, ptxpassword character varying, pstatususer character varying, pusertype integer, pdtregisteruser date) OWNER TO postgres;

SET default_tablespace = '';

--
-- TOC entry 196 (class 1259 OID 24579)
-- Name: tb_addresses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_addresses (
    idadress integer NOT NULL,
    txnomeend character varying(120),
    txbairroend character varying(30),
    txcidadeend character varying(40),
    txestadoend character varying(35),
    txcomplementoend character varying(20)
);


ALTER TABLE public.tb_addresses OWNER TO postgres;

--
-- TOC entry 3025 (class 0 OID 0)
-- Dependencies: 196
-- Name: TABLE tb_addresses; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_addresses IS 'tabela com os enderecos';


--
-- TOC entry 197 (class 1259 OID 24582)
-- Name: tb_brands; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_brands (
    idbrand integer NOT NULL,
    txnamebrand character varying(50)
);


ALTER TABLE public.tb_brands OWNER TO postgres;

--
-- TOC entry 3026 (class 0 OID 0)
-- Dependencies: 197
-- Name: TABLE tb_brands; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_brands IS 'Tabela com as marcas de produtos';


--
-- TOC entry 198 (class 1259 OID 24585)
-- Name: tb_categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_categories (
    idcategory integer NOT NULL,
    txnamecategory character varying(30)
);


ALTER TABLE public.tb_categories OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 24588)
-- Name: tb_cities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_cities (
    idcidade integer NOT NULL,
    txnomecidade character varying(20)
);


ALTER TABLE public.tb_cities OWNER TO postgres;

--
-- TOC entry 3027 (class 0 OID 0)
-- Dependencies: 199
-- Name: TABLE tb_cities; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_cities IS 'Tabela com as cidades';


--
-- TOC entry 200 (class 1259 OID 24591)
-- Name: tb_contacts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_contacts (
    idcontato integer NOT NULL,
    txnome character varying(120),
    txcelular character varying(10),
    txtelefone character varying(10),
    nuareaddd integer,
    ceusuario integer
);


ALTER TABLE public.tb_contacts OWNER TO postgres;

--
-- TOC entry 3028 (class 0 OID 0)
-- Dependencies: 200
-- Name: TABLE tb_contacts; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_contacts IS 'Tabela com os meios de comunicação';


--
-- TOC entry 201 (class 1259 OID 24594)
-- Name: tb_countries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_countries (
    idcountrie integer NOT NULL,
    txnamecountry character varying(60)
);


ALTER TABLE public.tb_countries OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 24597)
-- Name: tb_customers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_customers (
    idcustomer integer NOT NULL,
    txnamecustomer character varying(120),
    numcpfcustomer numeric(8,0) NOT NULL,
    txareacustomer character varying(50),
    dtregistercustomer date
);


ALTER TABLE public.tb_customers OWNER TO postgres;

--
-- TOC entry 3029 (class 0 OID 0)
-- Dependencies: 202
-- Name: TABLE tb_customers; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_customers IS 'Tabela de clientes da empresa';


--
-- TOC entry 203 (class 1259 OID 24600)
-- Name: tb_farms; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_farms (
    idfarm integer NOT NULL,
    txnamefarm character(70),
    txdescriptionfarm character varying(120),
    idadressfarm integer NOT NULL
);


ALTER TABLE public.tb_farms OWNER TO postgres;

--
-- TOC entry 3030 (class 0 OID 0)
-- Dependencies: 203
-- Name: TABLE tb_farms; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_farms IS 'tabela com o cadastros das fazendas do cliente';


--
-- TOC entry 204 (class 1259 OID 24603)
-- Name: tb_farmsemployees; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_farmsemployees (
    idfuncionariofazenda integer NOT NULL,
    txnome character varying(70),
    txendereco character varying(120),
    nucelular integer,
    nurg integer NOT NULL,
    nucpf integer NOT NULL,
    txemail character varying(120)
);


ALTER TABLE public.tb_farmsemployees OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 24606)
-- Name: tb_functionalities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_functionalities (
    idfunction integer NOT NULL,
    txnamefunction character varying(80) NOT NULL,
    access boolean NOT NULL
);


ALTER TABLE public.tb_functionalities OWNER TO postgres;

--
-- TOC entry 3031 (class 0 OID 0)
-- Dependencies: 205
-- Name: TABLE tb_functionalities; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_functionalities IS 'Tabela com as funcoes de acordo com o nivel de autorizacao';


--
-- TOC entry 206 (class 1259 OID 24609)
-- Name: tb_implements; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_implements (
    idimplement integer NOT NULL,
    txnameimplement character varying(120),
    txmodelimplement character varying(30),
    txtype character varying(30),
    nuanofabricacaoimp integer,
    txdescricaoimp character varying(30)
);


ALTER TABLE public.tb_implements OWNER TO postgres;

--
-- TOC entry 3032 (class 0 OID 0)
-- Dependencies: 206
-- Name: TABLE tb_implements; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_implements IS 'Tabela com os implementos dos clientes para manutenção ou para venda';


--
-- TOC entry 207 (class 1259 OID 24612)
-- Name: tb_managers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_managers (
    idgerente integer NOT NULL,
    txnomeger character varying(70),
    txenderecoger character varying(120),
    nutelefoneger double precision,
    nucelularger double precision,
    ceusuario integer NOT NULL
);


ALTER TABLE public.tb_managers OWNER TO postgres;

--
-- TOC entry 3033 (class 0 OID 0)
-- Dependencies: 207
-- Name: TABLE tb_managers; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_managers IS 'tabela de usuario tipo gerente';


--
-- TOC entry 208 (class 1259 OID 24615)
-- Name: tb_mediaorders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_mediaorders (
    idtmediatype integer NOT NULL,
    idserviceorder integer,
    txdescription character varying(60)
);


ALTER TABLE public.tb_mediaorders OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 24618)
-- Name: tb_mediarequest; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_mediarequest (
    idmediatype integer NOT NULL,
    idmediarequest integer NOT NULL,
    txdescription character varying(60)
);


ALTER TABLE public.tb_mediarequest OWNER TO postgres;

--
-- TOC entry 3034 (class 0 OID 0)
-- Dependencies: 209
-- Name: TABLE tb_mediarequest; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_mediarequest IS 'tabela com a media das requests - solicitações ';


--
-- TOC entry 210 (class 1259 OID 24621)
-- Name: tb_mediatypes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_mediatypes (
    idmediatype integer NOT NULL,
    txnamemediatype character varying(60)
);


ALTER TABLE public.tb_mediatypes OWNER TO postgres;

--
-- TOC entry 3035 (class 0 OID 0)
-- Dependencies: 210
-- Name: TABLE tb_mediatypes; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_mediatypes IS 'Tipos de Midia aceitos no sistema';


--
-- TOC entry 226 (class 1259 OID 49152)
-- Name: tb_passwordsrecoveries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_passwordsrecoveries (
    idrecovery integer NOT NULL,
    userfk integer NOT NULL,
    nuip character varying(45) NOT NULL,
    dtrecovery date,
    dtregister date NOT NULL
);


ALTER TABLE public.tb_passwordsrecoveries OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 24624)
-- Name: tb_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_permissions (
    idusuario integer NOT NULL,
    idfuncionalidade integer NOT NULL,
    txautorizacao boolean NOT NULL
);


ALTER TABLE public.tb_permissions OWNER TO postgres;

--
-- TOC entry 3036 (class 0 OID 0)
-- Dependencies: 211
-- Name: TABLE tb_permissions; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_permissions IS 'tabela com as permissões de cada usuário';


--
-- TOC entry 225 (class 1259 OID 40964)
-- Name: tb_person; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_person (
    idperson integer NOT NULL,
    txfirstnameperson character varying NOT NULL,
    txlastnameperson character varying,
    nugeneralrecord character varying(9) NOT NULL,
    nucpf character varying(11) NOT NULL,
    addressfk integer,
    email character varying(50) NOT NULL,
    userfk integer
);


ALTER TABLE public.tb_person OWNER TO postgres;

--
-- TOC entry 3037 (class 0 OID 0)
-- Dependencies: 225
-- Name: TABLE tb_person; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_person IS 'Tabela de pessoas do sistema';


--
-- TOC entry 212 (class 1259 OID 24627)
-- Name: tb_products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_products (
    idproduct integer NOT NULL,
    txnameproduct character varying(30),
    txdescriptionproduct character varying(80),
    priceproduct double precision NOT NULL,
    nuamountproduct integer NOT NULL,
    fkbrandproduct integer NOT NULL
);


ALTER TABLE public.tb_products OWNER TO postgres;

--
-- TOC entry 3038 (class 0 OID 0)
-- Dependencies: 212
-- Name: TABLE tb_products; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_products IS 'Tabela com os produtos';


--
-- TOC entry 3039 (class 0 OID 0)
-- Dependencies: 212
-- Name: COLUMN tb_products.fkbrandproduct; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tb_products.fkbrandproduct IS 'FK da tabela tb_brands';


--
-- TOC entry 213 (class 1259 OID 24630)
-- Name: tb_providers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_providers (
    idprovider integer NOT NULL,
    txcorporatename character varying(80),
    txfantsyname character varying(80),
    nucnpj integer,
    nustateregistration integer,
    numunicipalregistration integer
);


ALTER TABLE public.tb_providers OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 24633)
-- Name: tb_requests; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_requests (
    idrequest integer NOT NULL,
    txsituation character varying(60),
    txproblem character varying(60),
    customerfk integer NOT NULL,
    farmfk integer NOT NULL,
    implementfk integer NOT NULL,
    mediafk integer NOT NULL,
    statusfk integer NOT NULL
);


ALTER TABLE public.tb_requests OWNER TO postgres;

--
-- TOC entry 3040 (class 0 OID 0)
-- Dependencies: 214
-- Name: TABLE tb_requests; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_requests IS 'Tabela de solicitacaoes dos clientes da prestadora';


--
-- TOC entry 215 (class 1259 OID 24636)
-- Name: tb_services; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_services (
    idservice integer NOT NULL,
    txdescriptionservice character varying(120),
    txtypeimplement character varying(120),
    vlpriceservice real NOT NULL
);


ALTER TABLE public.tb_services OWNER TO postgres;

--
-- TOC entry 3041 (class 0 OID 0)
-- Dependencies: 215
-- Name: TABLE tb_services; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_services IS 'tabela de serviços da empresa';


--
-- TOC entry 216 (class 1259 OID 24639)
-- Name: tb_servicesorders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_servicesorders (
    idorderservice integer NOT NULL,
    "dataInicio" date NOT NULL,
    "dataFim" date NOT NULL,
    statusorderfk integer NOT NULL,
    aoapproval boolean NOT NULL,
    customerorderfk integer NOT NULL
);


ALTER TABLE public.tb_servicesorders OWNER TO postgres;

--
-- TOC entry 3042 (class 0 OID 0)
-- Dependencies: 216
-- Name: TABLE tb_servicesorders; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_servicesorders IS 'Tabela de ordens de servico';


--
-- TOC entry 217 (class 1259 OID 24642)
-- Name: tb_states; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_states (
    idstate integer NOT NULL,
    txnamestate character varying(60)
);


ALTER TABLE public.tb_states OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 24645)
-- Name: tb_status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_status (
    idstatus integer NOT NULL,
    txnamestatus character varying(60)
);


ALTER TABLE public.tb_status OWNER TO postgres;

--
-- TOC entry 3043 (class 0 OID 0)
-- Dependencies: 218
-- Name: TABLE tb_status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_status IS 'tabela com o status do usuário ';


--
-- TOC entry 219 (class 1259 OID 24648)
-- Name: tb_technicians; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_technicians (
    idtechnician integer NOT NULL,
    txnametechnician character varying(70),
    txemailtechnicians character varying(120),
    nucellphonetechnician integer
);


ALTER TABLE public.tb_technicians OWNER TO postgres;

--
-- TOC entry 3044 (class 0 OID 0)
-- Dependencies: 219
-- Name: TABLE tb_technicians; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_technicians IS 'tabela de usuarios tipo técnicos';


--
-- TOC entry 220 (class 1259 OID 24651)
-- Name: tb_titles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_titles (
    idtitulo integer NOT NULL,
    nuparcelatitulo integer NOT NULL,
    idcliente integer NOT NULL,
    dtvencimentotitulo date,
    nudiasatraso double precision,
    vlvalortitulo double precision NOT NULL,
    vljuros double precision,
    vlmulta double precision,
    vlencargos double precision,
    vldesconto double precision,
    vlrecebido double precision,
    txstatus character varying(50),
    vlsaldototal double precision,
    txtipotitulo character varying(50),
    dtcompra date,
    dtrecebimento date
);


ALTER TABLE public.tb_titles OWNER TO postgres;

--
-- TOC entry 3045 (class 0 OID 0)
-- Dependencies: 220
-- Name: TABLE tb_titles; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_titles IS 'Tabela com os titulos de cobrança';


--
-- TOC entry 221 (class 1259 OID 24654)
-- Name: tb_transactions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_transactions (
    idtransacao integer NOT NULL,
    dttransacao date,
    cevenda integer,
    nuhora integer,
    ceoperador integer,
    txdescricaotransacao character varying(70),
    txobservacaotransacao character varying(70),
    vlprecoprazo double precision,
    nutotalcredito double precision,
    nutotaldebito double precision,
    nusaldo double precision
);


ALTER TABLE public.tb_transactions OWNER TO postgres;

--
-- TOC entry 3046 (class 0 OID 0)
-- Dependencies: 221
-- Name: TABLE tb_transactions; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_transactions IS 'Tabela com as transações do caixa';


--
-- TOC entry 222 (class 1259 OID 24657)
-- Name: tb_users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_users (
    iduser integer NOT NULL,
    txlogin character varying(100) NOT NULL,
    txpassword character varying(16) NOT NULL,
    usertype integer NOT NULL,
    dtregisteruser date NOT NULL,
    statususer integer
);


ALTER TABLE public.tb_users OWNER TO postgres;

--
-- TOC entry 3047 (class 0 OID 0)
-- Dependencies: 222
-- Name: TABLE tb_users; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tb_users IS 'Tabela de usuários do sistema';


--
-- TOC entry 223 (class 1259 OID 24660)
-- Name: tb_users_iduser_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_users_iduser_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_users_iduser_seq OWNER TO postgres;

--
-- TOC entry 3048 (class 0 OID 0)
-- Dependencies: 223
-- Name: tb_users_iduser_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_users_iduser_seq OWNED BY public.tb_users.iduser;


--
-- TOC entry 224 (class 1259 OID 24662)
-- Name: tb_userstype; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_userstype (
    idusertype integer NOT NULL,
    txnameusertype character varying(80),
    dtregisterusertype date
);


ALTER TABLE public.tb_userstype OWNER TO postgres;

--
-- TOC entry 2804 (class 2604 OID 24665)
-- Name: tb_users iduser; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_users ALTER COLUMN iduser SET DEFAULT nextval('public.tb_users_iduser_seq'::regclass);


--
-- TOC entry 2987 (class 0 OID 24579)
-- Dependencies: 196
-- Data for Name: tb_addresses; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2988 (class 0 OID 24582)
-- Dependencies: 197
-- Data for Name: tb_brands; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2989 (class 0 OID 24585)
-- Dependencies: 198
-- Data for Name: tb_categories; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2990 (class 0 OID 24588)
-- Dependencies: 199
-- Data for Name: tb_cities; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_cities (idcidade, txnomecidade) VALUES (1, 'Fartura');
INSERT INTO public.tb_cities (idcidade, txnomecidade) VALUES (2, 'Piraju');
INSERT INTO public.tb_cities (idcidade, txnomecidade) VALUES (3, 'Ourinhos');
INSERT INTO public.tb_cities (idcidade, txnomecidade) VALUES (4, 'Taguai');
INSERT INTO public.tb_cities (idcidade, txnomecidade) VALUES (5, 'Sarutaia');
INSERT INTO public.tb_cities (idcidade, txnomecidade) VALUES (6, 'São Paulo');


--
-- TOC entry 2991 (class 0 OID 24591)
-- Dependencies: 200
-- Data for Name: tb_contacts; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2992 (class 0 OID 24594)
-- Dependencies: 201
-- Data for Name: tb_countries; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2993 (class 0 OID 24597)
-- Dependencies: 202
-- Data for Name: tb_customers; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_customers (idcustomer, txnamecustomer, numcpfcustomer, txareacustomer, dtregistercustomer) VALUES (1, 'Pedro Henrique', 64578934, 'Produtor Rural', '2019-06-24');
INSERT INTO public.tb_customers (idcustomer, txnamecustomer, numcpfcustomer, txareacustomer, dtregistercustomer) VALUES (2, 'Paulo Garcia', 5546456, 'Agricultor', '2019-06-24');
INSERT INTO public.tb_customers (idcustomer, txnamecustomer, numcpfcustomer, txareacustomer, dtregistercustomer) VALUES (3, 'Guilherme Sanches', 56464465, 'Agronomo', '2019-06-24');


--
-- TOC entry 2994 (class 0 OID 24600)
-- Dependencies: 203
-- Data for Name: tb_farms; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_farms (idfarm, txnamefarm, txdescriptionfarm, idadressfarm) VALUES (1, 'Santa Rita                                                            ', 'Fazenda de plantação de Café', 1);
INSERT INTO public.tb_farms (idfarm, txnamefarm, txdescriptionfarm, idadressfarm) VALUES (2, 'Santa Rosa                                                            ', 'Fazenda de milho', 2);
INSERT INTO public.tb_farms (idfarm, txnamefarm, txdescriptionfarm, idadressfarm) VALUES (3, 'Santa Monica                                                          ', 'Fazneda de Cana de Açucar', 3);


--
-- TOC entry 2995 (class 0 OID 24603)
-- Dependencies: 204
-- Data for Name: tb_farmsemployees; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2996 (class 0 OID 24606)
-- Dependencies: 205
-- Data for Name: tb_functionalities; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2997 (class 0 OID 24609)
-- Dependencies: 206
-- Data for Name: tb_implements; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_implements (idimplement, txnameimplement, txmodelimplement, txtype, nuanofabricacaoimp, txdescricaoimp) VALUES (1, 'Coroadeira', 'Standart', 'Varredoura', 2019, 'Varre embaixo do pé');
INSERT INTO public.tb_implements (idimplement, txnameimplement, txmodelimplement, txtype, nuanofabricacaoimp, txdescricaoimp) VALUES (2, 'Ensiladeira', 'JF 60 Maxxium', 'Estacionaria', 2018, 'fazer alimento para rebanho');
INSERT INTO public.tb_implements (idimplement, txnameimplement, txmodelimplement, txtype, nuanofabricacaoimp, txdescricaoimp) VALUES (3, 'Carreta Agricola', 'Carreta
', 'trator', 2019, 'Carregar');


--
-- TOC entry 2998 (class 0 OID 24612)
-- Dependencies: 207
-- Data for Name: tb_managers; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2999 (class 0 OID 24615)
-- Dependencies: 208
-- Data for Name: tb_mediaorders; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3000 (class 0 OID 24618)
-- Dependencies: 209
-- Data for Name: tb_mediarequest; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3001 (class 0 OID 24621)
-- Dependencies: 210
-- Data for Name: tb_mediatypes; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3017 (class 0 OID 49152)
-- Dependencies: 226
-- Data for Name: tb_passwordsrecoveries; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3002 (class 0 OID 24624)
-- Dependencies: 211
-- Data for Name: tb_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3016 (class 0 OID 40964)
-- Dependencies: 225
-- Data for Name: tb_person; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_person (idperson, txfirstnameperson, txlastnameperson, nugeneralrecord, nucpf, addressfk, email, userfk) VALUES (1, 'Afonso
', 'Santos', '50413212x', '46004048828', 1, 'afonsoapsantos@outlook.com', 1);


--
-- TOC entry 3003 (class 0 OID 24627)
-- Dependencies: 212
-- Data for Name: tb_products; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3004 (class 0 OID 24630)
-- Dependencies: 213
-- Data for Name: tb_providers; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3005 (class 0 OID 24633)
-- Dependencies: 214
-- Data for Name: tb_requests; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_requests (idrequest, txsituation, txproblem, customerfk, farmfk, implementfk, mediafk, statusfk) VALUES (1, 'Maquina encontra-se na plantação', 'Quebrou eixo da plataforma colhedora', 1, 1, 1, 1, 3);
INSERT INTO public.tb_requests (idrequest, txsituation, txproblem, customerfk, farmfk, implementfk, mediafk, statusfk) VALUES (3, 'Na plantação caida', 'Roda saiu fora', 3, 3, 3, 3, 3);
INSERT INTO public.tb_requests (idrequest, txsituation, txproblem, customerfk, farmfk, implementfk, mediafk, statusfk) VALUES (2, 'Na fazenda', 'Quebrou a tampa', 2, 2, 2, 2, 3);


--
-- TOC entry 3006 (class 0 OID 24636)
-- Dependencies: 215
-- Data for Name: tb_services; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_services (idservice, txdescriptionservice, txtypeimplement, vlpriceservice) VALUES (1, 'Conserto da roçadeira. Quebrou as facas.', 'Roçadeira', 150);


--
-- TOC entry 3007 (class 0 OID 24639)
-- Dependencies: 216
-- Data for Name: tb_servicesorders; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3008 (class 0 OID 24642)
-- Dependencies: 217
-- Data for Name: tb_states; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3009 (class 0 OID 24645)
-- Dependencies: 218
-- Data for Name: tb_status; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_status (idstatus, txnamestatus) VALUES (1, 'Ativo');
INSERT INTO public.tb_status (idstatus, txnamestatus) VALUES (2, 'Inativo');
INSERT INTO public.tb_status (idstatus, txnamestatus) VALUES (3, 'Pendente');
INSERT INTO public.tb_status (idstatus, txnamestatus) VALUES (4, 'Solicitação');
INSERT INTO public.tb_status (idstatus, txnamestatus) VALUES (5, 'Aguardando Liberação');
INSERT INTO public.tb_status (idstatus, txnamestatus) VALUES (6, 'Desativado');


--
-- TOC entry 3010 (class 0 OID 24648)
-- Dependencies: 219
-- Data for Name: tb_technicians; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3011 (class 0 OID 24651)
-- Dependencies: 220
-- Data for Name: tb_titles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_titles (idtitulo, nuparcelatitulo, idcliente, dtvencimentotitulo, nudiasatraso, vlvalortitulo, vljuros, vlmulta, vlencargos, vldesconto, vlrecebido, txstatus, vlsaldototal, txtipotitulo, dtcompra, dtrecebimento) VALUES (1, 1, 1, '2019-08-26', -6, 250, 0, 0, 0, 0, 120, 'aberto', 130, 'crediario', NULL, NULL);


--
-- TOC entry 3012 (class 0 OID 24654)
-- Dependencies: 221
-- Data for Name: tb_transactions; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3013 (class 0 OID 24657)
-- Dependencies: 222
-- Data for Name: tb_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (4, 'Marvos', '54545', 4, '2019-08-31', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (8, 'OtavioMarcos', '564965', 4, '2019-09-01', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (3, 'Andre', '646513', 2, '2019-08-31', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (6, 'Edilson', '658498', 3, '2019-08-31', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (2, 'Guilherme', 'guilherme', 1, '2019-08-31', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (7, 'Everton', '465465', 3, '2019-08-31', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (9, 'Ricardo', '3254156', 5, '2019-09-01', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (11, 'JoseValdir', '49648', 4, '2019-09-01', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (12, 'AntonioMarcos', '248489', 4, '2019-09-01', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (18, 'Ramiro', '1234', 4, '2019-10-23', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (13, 'LuizHenrique', 'admin', 4, '2019-10-23', 4);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (17, 'LuizHenrique', 'admin', 4, '2019-10-23', 4);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (1, 'AfonsoSantos', '642691', 1, '2019-08-31', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (5, 'EuridesAntonioSimao', '5878956', 3, '2019-08-31', 1);
INSERT INTO public.tb_users (iduser, txlogin, txpassword, usertype, dtregisteruser, statususer) VALUES (16, 'ValdenirVilasBoas', 'admin', 4, '2019-10-23', 4);


--
-- TOC entry 3015 (class 0 OID 24662)
-- Dependencies: 224
-- Data for Name: tb_userstype; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_userstype (idusertype, txnameusertype, dtregisterusertype) VALUES (1, 'Administrador', '2019-06-23');
INSERT INTO public.tb_userstype (idusertype, txnameusertype, dtregisterusertype) VALUES (2, 'Gerente', '2019-06-23');
INSERT INTO public.tb_userstype (idusertype, txnameusertype, dtregisterusertype) VALUES (3, 'Tecnico', '2019-06-23');
INSERT INTO public.tb_userstype (idusertype, txnameusertype, dtregisterusertype) VALUES (4, 'Cliente', '2019-06-23');
INSERT INTO public.tb_userstype (idusertype, txnameusertype, dtregisterusertype) VALUES (5, 'Funcionario Fazenda', '2019-06-23');


--
-- TOC entry 3049 (class 0 OID 0)
-- Dependencies: 223
-- Name: tb_users_iduser_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_users_iduser_seq', 18, true);


--
-- TOC entry 2818 (class 2606 OID 24667)
-- Name: tb_customers Clientes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_customers
    ADD CONSTRAINT "Clientes_pkey" PRIMARY KEY (idcustomer);


--
-- TOC entry 2820 (class 2606 OID 24669)
-- Name: tb_farms Fazendas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_farms
    ADD CONSTRAINT "Fazendas_pkey" PRIMARY KEY (idfarm);


--
-- TOC entry 2838 (class 2606 OID 24671)
-- Name: tb_providers Fornecedor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_providers
    ADD CONSTRAINT "Fornecedor_pkey" PRIMARY KEY (idprovider);


--
-- TOC entry 2822 (class 2606 OID 24673)
-- Name: tb_farmsemployees FuncionariosFazenda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_farmsemployees
    ADD CONSTRAINT "FuncionariosFazenda_pkey" PRIMARY KEY (idfuncionariofazenda);


--
-- TOC entry 2828 (class 2606 OID 24675)
-- Name: tb_mediaorders MidiaOrdem_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_mediaorders
    ADD CONSTRAINT "MidiaOrdem_pkey" PRIMARY KEY (idtmediatype);


--
-- TOC entry 2842 (class 2606 OID 24679)
-- Name: tb_services Serviços_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_services
    ADD CONSTRAINT "Serviços_pkey" PRIMARY KEY (idservice);


--
-- TOC entry 2840 (class 2606 OID 24681)
-- Name: tb_requests Solicitacao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_requests
    ADD CONSTRAINT "Solicitacao_pkey" PRIMARY KEY (idrequest);


--
-- TOC entry 2850 (class 2606 OID 24683)
-- Name: tb_technicians Tecnicos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_technicians
    ADD CONSTRAINT "Tecnicos_pkey" PRIMARY KEY (idtechnician);


--
-- TOC entry 2832 (class 2606 OID 24685)
-- Name: tb_mediatypes TipoMidiaOrdem_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_mediatypes
    ADD CONSTRAINT "TipoMidiaOrdem_pkey" PRIMARY KEY (idmediatype);


--
-- TOC entry 2856 (class 2606 OID 24687)
-- Name: tb_users Users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_users
    ADD CONSTRAINT "Users_pkey" PRIMARY KEY (iduser);


--
-- TOC entry 2812 (class 2606 OID 24689)
-- Name: tb_cities cidades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_cities
    ADD CONSTRAINT cidades_pkey PRIMARY KEY (idcidade);


--
-- TOC entry 2814 (class 2606 OID 24691)
-- Name: tb_contacts contatos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_contacts
    ADD CONSTRAINT contatos_pkey PRIMARY KEY (idcontato);


--
-- TOC entry 2806 (class 2606 OID 24693)
-- Name: tb_addresses enderecos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_addresses
    ADD CONSTRAINT enderecos_pkey PRIMARY KEY (idadress);


--
-- TOC entry 2844 (class 2606 OID 24677)
-- Name: tb_servicesorders idorderidservice; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_servicesorders
    ADD CONSTRAINT idorderidservice PRIMARY KEY (idorderservice);


--
-- TOC entry 2826 (class 2606 OID 24695)
-- Name: tb_implements implementos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_implements
    ADD CONSTRAINT implementos_pkey PRIMARY KEY (idimplement);


--
-- TOC entry 2824 (class 2606 OID 24697)
-- Name: tb_functionalities none; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_functionalities
    ADD CONSTRAINT "none" PRIMARY KEY (idfunction);


--
-- TOC entry 2834 (class 2606 OID 24699)
-- Name: tb_permissions permissoes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_permissions
    ADD CONSTRAINT permissoes_pkey PRIMARY KEY (idusuario, idfuncionalidade);


--
-- TOC entry 2836 (class 2606 OID 24701)
-- Name: tb_products produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_products
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (idproduct);


--
-- TOC entry 2808 (class 2606 OID 24703)
-- Name: tb_brands tb_brands_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_brands
    ADD CONSTRAINT tb_brands_pkey PRIMARY KEY (idbrand);


--
-- TOC entry 2810 (class 2606 OID 24705)
-- Name: tb_categories tb_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_categories
    ADD CONSTRAINT tb_categories_pkey PRIMARY KEY (idcategory);


--
-- TOC entry 2816 (class 2606 OID 24707)
-- Name: tb_countries tb_countries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_countries
    ADD CONSTRAINT tb_countries_pkey PRIMARY KEY (idcountrie);


--
-- TOC entry 2830 (class 2606 OID 24709)
-- Name: tb_mediarequest tb_mediarequest_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_mediarequest
    ADD CONSTRAINT tb_mediarequest_pkey PRIMARY KEY (idmediatype, idmediarequest);


--
-- TOC entry 2862 (class 2606 OID 49156)
-- Name: tb_passwordsrecoveries tb_passwordsrecoveries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_passwordsrecoveries
    ADD CONSTRAINT tb_passwordsrecoveries_pkey PRIMARY KEY (idrecovery);


--
-- TOC entry 2860 (class 2606 OID 40971)
-- Name: tb_person tb_person_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_person
    ADD CONSTRAINT tb_person_pkey PRIMARY KEY (idperson);


--
-- TOC entry 2846 (class 2606 OID 24711)
-- Name: tb_states tb_states_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_states
    ADD CONSTRAINT tb_states_pkey PRIMARY KEY (idstate);


--
-- TOC entry 2848 (class 2606 OID 24713)
-- Name: tb_status tb_status_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_status
    ADD CONSTRAINT tb_status_pkey PRIMARY KEY (idstatus);


--
-- TOC entry 2852 (class 2606 OID 24715)
-- Name: tb_titles titulos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_titles
    ADD CONSTRAINT titulos_pkey PRIMARY KEY (idtitulo);


--
-- TOC entry 2854 (class 2606 OID 24717)
-- Name: tb_transactions transacoes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_transactions
    ADD CONSTRAINT transacoes_pkey PRIMARY KEY (idtransacao);


--
-- TOC entry 2858 (class 2606 OID 24719)
-- Name: tb_userstype usuarioTipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_userstype
    ADD CONSTRAINT "usuarioTipo_pkey" PRIMARY KEY (idusertype);


--
-- TOC entry 2863 (class 2606 OID 24720)
-- Name: tb_mediaorders MidiaOrdem_fkey1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_mediaorders
    ADD CONSTRAINT "MidiaOrdem_fkey1" FOREIGN KEY (idtmediatype) REFERENCES public.tb_mediatypes(idmediatype) ON UPDATE CASCADE ON DELETE RESTRICT DEFERRABLE INITIALLY DEFERRED;


--
-- TOC entry 2865 (class 2606 OID 49157)
-- Name: tb_person personfk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_person
    ADD CONSTRAINT personfk FOREIGN KEY (userfk) REFERENCES public.tb_users(iduser) DEFERRABLE INITIALLY DEFERRED NOT VALID;


--
-- TOC entry 2864 (class 2606 OID 24725)
-- Name: tb_titles titulo_fk01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_titles
    ADD CONSTRAINT titulo_fk01 FOREIGN KEY (idcliente) REFERENCES public.tb_customers(idcustomer) ON UPDATE RESTRICT DEFERRABLE INITIALLY DEFERRED;


--
-- TOC entry 3050 (class 0 OID 0)
-- Dependencies: 2864
-- Name: CONSTRAINT titulo_fk01 ON tb_titles; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON CONSTRAINT titulo_fk01 ON public.tb_titles IS 'chave estrangeira da tabela clientes';


-- Completed on 2019-11-05 11:41:43

--
-- PostgreSQL database dump complete
--

