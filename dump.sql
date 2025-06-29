--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: repeat_type; Type: TYPE; Schema: public; Owner: myuser
--

CREATE TYPE public.repeat_type AS ENUM (
    'NO_REPEAT',
    'DAILY_REPEAT',
    'WEEKLY_REPEAT'
);

ALTER TYPE public.repeat_type OWNER TO myuser;

SET default_tablespace = '';
SET default_table_access_method = heap;

--
-- Name: activities; Type: TABLE; Schema: public; Owner: myuser
--

CREATE TABLE public.activities (
    id integer NOT NULL,
    animal_id integer NOT NULL,
    activity_date date NOT NULL,
    start_time time without time zone NOT NULL,
    end_time time without time zone NOT NULL,
    activity_text text NOT NULL
);

ALTER TABLE public.activities OWNER TO myuser;

--
-- Name: activities_id_seq; Type: SEQUENCE; Schema: public; Owner: myuser
--

CREATE SEQUENCE public.activities_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.activities_id_seq OWNER TO myuser;

ALTER SEQUENCE public.activities_id_seq OWNED BY public.activities.id;

--
-- Name: animals; Type: TABLE; Schema: public; Owner: myuser
--

CREATE TABLE public.animals (
    id integer NOT NULL,
    id_user integer NOT NULL,
    name character varying(100) NOT NULL,
    species character varying(100) NOT NULL,
    birth date,
    description text,
    avatar character varying(255)
);

ALTER TABLE public.animals OWNER TO myuser;

--
-- Name: animals_id_seq; Type: SEQUENCE; Schema: public; Owner: myuser
--

CREATE SEQUENCE public.animals_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.animals_id_seq OWNER TO myuser;

ALTER SEQUENCE public.animals_id_seq OWNED BY public.animals.id;

--
-- Name: notifications; Type: TABLE; Schema: public; Owner: myuser
--

CREATE TABLE public.notifications (
    id integer NOT NULL,
    animal_id integer NOT NULL,
    notification_time time without time zone NOT NULL,
    notification_message text NOT NULL,
    repeat public.repeat_type DEFAULT 'NO_REPEAT'::public.repeat_type NOT NULL
);

ALTER TABLE public.notifications OWNER TO myuser;

--
-- Name: notifications_id_seq; Type: SEQUENCE; Schema: public; Owner: myuser
--

CREATE SEQUENCE public.notifications_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.notifications_id_seq OWNER TO myuser;

ALTER SEQUENCE public.notifications_id_seq OWNED BY public.notifications.id;

--
-- Name: permissions; Type: TABLE; Schema: public; Owner: myuser
--

CREATE TABLE public.permissions (
    id integer NOT NULL,
    permission_name character varying(50) NOT NULL
);

ALTER TABLE public.permissions OWNER TO myuser;

--
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: myuser
--

CREATE SEQUENCE public.permissions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.permissions_id_seq OWNER TO myuser;

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;

--
-- Name: role_permissions; Type: TABLE; Schema: public; Owner: myuser
--

CREATE TABLE public.role_permissions (
    role_id integer NOT NULL,
    permission_id integer NOT NULL
);

ALTER TABLE public.role_permissions OWNER TO myuser;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: myuser
--

CREATE TABLE public.roles (
    id integer NOT NULL,
    role_name character varying(50) NOT NULL
);

ALTER TABLE public.roles OWNER TO myuser;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: myuser
--

CREATE SEQUENCE public.roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.roles_id_seq OWNER TO myuser;

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;

--
-- Name: users; Type: TABLE; Schema: public; Owner: myuser
--

CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    name character varying(50) NOT NULL,
    surname character varying(50) NOT NULL,
    role_id integer
);

ALTER TABLE public.users OWNER TO myuser;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: myuser
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.users_id_seq OWNER TO myuser;

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;

--
-- Name: weights; Type: TABLE; Schema: public; Owner: myuser
--

CREATE TABLE public.weights (
    id integer NOT NULL,
    animal_id integer NOT NULL,
    date_weight date NOT NULL,
    weight numeric(6,2) NOT NULL
);

ALTER TABLE public.weights OWNER TO myuser;

--
-- Name: weights_id_seq; Type: SEQUENCE; Schema: public; Owner: myuser
--

CREATE SEQUENCE public.weights_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.weights_id_seq OWNER TO myuser;

ALTER SEQUENCE public.weights_id_seq OWNED BY public.weights.id;

--
-- DEFAULTS
--

ALTER TABLE ONLY public.activities ALTER COLUMN id SET DEFAULT nextval('public.activities_id_seq'::regclass);
ALTER TABLE ONLY public.animals ALTER COLUMN id SET DEFAULT nextval('public.animals_id_seq'::regclass);
ALTER TABLE ONLY public.notifications ALTER COLUMN id SET DEFAULT nextval('public.notifications_id_seq'::regclass);
ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);
ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
ALTER TABLE ONLY public.weights ALTER COLUMN id SET DEFAULT nextval('public.weights_id_seq'::regclass);

--
-- EXAMPLE DATA
--

COPY public.roles (id, role_name) FROM stdin;
1	admin
2	user
\.

COPY public.users (id, email, password, name, surname, role_id) FROM stdin;
1	demo@example.com	$2y$10$abcdefghijklmnopqrstuv.DemoHashHashHashHash	Demo	User	2
\.

COPY public.animals (id, id_user, name, species, birth, description, avatar) FROM stdin;
1	1	DemoRodent	DemoSpecies	2024-01-01	This is a demo rodent	demo.png
\.

COPY public.activities (id, animal_id, activity_date, start_time, end_time, activity_text) FROM stdin;
1	1	2025-01-01	08:00:00	09:00:00	Test activity
\.

COPY public.weights (id, animal_id, date_weight, weight) FROM stdin;
1	1	2025-01-02	100.00
\.

COPY public.notifications (id, animal_id, notification_time, notification_message, repeat) FROM stdin;
1	1	12:00:00	Test notification	NO_REPEAT
\.

COPY public.permissions (id, permission_name) FROM stdin;
1	ADD_RODENT
\.

COPY public.role_permissions (role_id, permission_id) FROM stdin;
2	1
\.

--
-- SEQUENCE SETS
--

SELECT pg_catalog.setval('public.activities_id_seq', 1, true);
SELECT pg_catalog.setval('public.animals_id_seq', 1, true);
SELECT pg_catalog.setval('public.notifications_id_seq', 1, true);
SELECT pg_catalog.setval('public.permissions_id_seq', 1, true);
SELECT pg_catalog.setval('public.roles_id_seq', 2, true);
SELECT pg_catalog.setval('public.users_id_seq', 1, true);
SELECT pg_catalog.setval('public.weights_id_seq', 1, true);

--
-- CONSTRAINTS
--

ALTER TABLE ONLY public.activities
    ADD CONSTRAINT activities_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.animals
    ADD CONSTRAINT animals_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.notifications
    ADD CONSTRAINT notifications_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_permission_name_key UNIQUE (permission_name);

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.role_permissions
    ADD CONSTRAINT role_permissions_pkey PRIMARY KEY (role_id, permission_id);

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_role_name_key UNIQUE (role_name);

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.weights
    ADD CONSTRAINT weights_pkey PRIMARY KEY (id);

--
-- FOREIGN KEYS
--

ALTER TABLE ONLY public.animals
    ADD CONSTRAINT animals_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id);

ALTER TABLE ONLY public.activities
    ADD CONSTRAINT fk_animal FOREIGN KEY (animal_id) REFERENCES public.animals(id) ON DELETE CASCADE;

ALTER TABLE ONLY public.notifications
    ADD CONSTRAINT notifications_animal_id_fkey FOREIGN KEY (animal_id) REFERENCES public.animals(id);

ALTER TABLE ONLY public.role_permissions
    ADD CONSTRAINT role_permissions_permission_id_fkey FOREIGN KEY (permission_id) REFERENCES public.permissions(id);

ALTER TABLE ONLY public.role_permissions
    ADD CONSTRAINT role_permissions_role_id_fkey FOREIGN KEY (role_id) REFERENCES public.roles(id);

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_role_id_fkey FOREIGN KEY (role_id) REFERENCES public.roles(id);

ALTER TABLE ONLY public.weights
    ADD CONSTRAINT weights_animal_id_fkey FOREIGN KEY (animal_id) REFERENCES public.animals(id) ON DELETE CASCADE;

--
-- PostgreSQL database dump complete
--
