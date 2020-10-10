--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.12
-- Dumped by pg_dump version 9.6.12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: audit_data; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.audit_data (
    id integer NOT NULL,
    entry_id integer NOT NULL,
    type character varying(255) NOT NULL,
    data bytea,
    created timestamp(0) without time zone
);


ALTER TABLE public.audit_data OWNER TO postgres;

--
-- Name: audit_data_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.audit_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_data_id_seq OWNER TO postgres;

--
-- Name: audit_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.audit_data_id_seq OWNED BY public.audit_data.id;


--
-- Name: audit_entry; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.audit_entry (
    id integer NOT NULL,
    created timestamp(0) without time zone NOT NULL,
    user_id integer DEFAULT 0,
    duration double precision,
    ip character varying(45),
    request_method character varying(16),
    ajax integer DEFAULT 0 NOT NULL,
    route character varying(255),
    memory_max integer
);


ALTER TABLE public.audit_entry OWNER TO postgres;

--
-- Name: audit_entry_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.audit_entry_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_entry_id_seq OWNER TO postgres;

--
-- Name: audit_entry_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.audit_entry_id_seq OWNED BY public.audit_entry.id;


--
-- Name: audit_error; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.audit_error (
    id integer NOT NULL,
    entry_id integer NOT NULL,
    created timestamp(0) without time zone NOT NULL,
    message text NOT NULL,
    code integer DEFAULT 0,
    file character varying(512),
    line integer,
    trace bytea,
    hash character varying(32),
    emailed boolean DEFAULT false NOT NULL
);


ALTER TABLE public.audit_error OWNER TO postgres;

--
-- Name: audit_error_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.audit_error_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_error_id_seq OWNER TO postgres;

--
-- Name: audit_error_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.audit_error_id_seq OWNED BY public.audit_error.id;


--
-- Name: audit_javascript; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.audit_javascript (
    id integer NOT NULL,
    entry_id integer NOT NULL,
    created timestamp(0) without time zone NOT NULL,
    type character varying(20) NOT NULL,
    message text NOT NULL,
    origin character varying(512),
    data bytea
);


ALTER TABLE public.audit_javascript OWNER TO postgres;

--
-- Name: audit_javascript_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.audit_javascript_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_javascript_id_seq OWNER TO postgres;

--
-- Name: audit_javascript_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.audit_javascript_id_seq OWNED BY public.audit_javascript.id;


--
-- Name: audit_mail; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.audit_mail (
    id integer NOT NULL,
    entry_id integer NOT NULL,
    created timestamp(0) without time zone NOT NULL,
    successful integer NOT NULL,
    "from" character varying(255),
    "to" character varying(255),
    reply character varying(255),
    cc character varying(255),
    bcc character varying(255),
    subject character varying(255),
    text bytea,
    html bytea,
    data bytea
);


ALTER TABLE public.audit_mail OWNER TO postgres;

--
-- Name: audit_mail_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.audit_mail_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_mail_id_seq OWNER TO postgres;

--
-- Name: audit_mail_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.audit_mail_id_seq OWNED BY public.audit_mail.id;


--
-- Name: audit_trail; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.audit_trail (
    id integer NOT NULL,
    entry_id integer,
    user_id integer,
    action character varying(255) NOT NULL,
    model character varying(255) NOT NULL,
    model_id character varying(255) NOT NULL,
    field character varying(255),
    old_value text,
    new_value text,
    created timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.audit_trail OWNER TO postgres;

--
-- Name: audit_trail_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.audit_trail_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_trail_id_seq OWNER TO postgres;

--
-- Name: audit_trail_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.audit_trail_id_seq OWNED BY public.audit_trail.id;


--
-- Name: auth_assignment; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.auth_assignment (
    item_name character varying(64) NOT NULL,
    user_id character varying(64) NOT NULL,
    created_at integer
);


ALTER TABLE public.auth_assignment OWNER TO postgres;

--
-- Name: auth_item; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.auth_item (
    name character varying(64) NOT NULL,
    type smallint NOT NULL,
    description text,
    rule_name character varying(64),
    data bytea,
    created_at integer,
    updated_at integer
);


ALTER TABLE public.auth_item OWNER TO postgres;

--
-- Name: auth_item_child; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.auth_item_child (
    parent character varying(64) NOT NULL,
    child character varying(64) NOT NULL
);


ALTER TABLE public.auth_item_child OWNER TO postgres;

--
-- Name: auth_rule; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.auth_rule (
    name character varying(64) NOT NULL,
    data bytea,
    created_at integer,
    updated_at integer
);


ALTER TABLE public.auth_rule OWNER TO postgres;

--
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE public.migration OWNER TO postgres;

--
-- Name: profile; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.profile (
    user_id integer NOT NULL,
    name character varying(255),
    public_email character varying(255),
    gravatar_email character varying(255),
    gravatar_id character varying(32),
    location character varying(255),
    website character varying(255),
    timezone character varying(40),
    bio text
);


ALTER TABLE public.profile OWNER TO postgres;

--
-- Name: profile_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.profile_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_user_id_seq OWNER TO postgres;

--
-- Name: profile_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.profile_user_id_seq OWNED BY public.profile.user_id;


--
-- Name: social_account; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.social_account (
    id integer NOT NULL,
    user_id integer,
    provider character varying(255) NOT NULL,
    client_id character varying(255) NOT NULL,
    code character varying(32),
    email character varying(255),
    username character varying(255),
    data text,
    created_at integer
);


ALTER TABLE public.social_account OWNER TO postgres;

--
-- Name: social_account_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.social_account_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.social_account_id_seq OWNER TO postgres;

--
-- Name: social_account_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.social_account_id_seq OWNED BY public.social_account.id;


--
-- Name: token; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.token (
    user_id integer,
    code character varying(32) NOT NULL,
    type smallint NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.token OWNER TO postgres;

--
-- Name: user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password_hash character varying(60) NOT NULL,
    auth_key character varying(32) NOT NULL,
    unconfirmed_email character varying(255),
    registration_ip character varying(45),
    flags integer DEFAULT 0 NOT NULL,
    confirmed_at integer,
    blocked_at integer,
    updated_at integer NOT NULL,
    created_at integer NOT NULL,
    last_login_at integer,
    auth_tf_key character varying(16),
    auth_tf_enabled boolean DEFAULT false,
    password_changed_at integer
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO postgres;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;


--
-- Name: audit_data id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_data ALTER COLUMN id SET DEFAULT nextval('public.audit_data_id_seq'::regclass);


--
-- Name: audit_entry id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_entry ALTER COLUMN id SET DEFAULT nextval('public.audit_entry_id_seq'::regclass);


--
-- Name: audit_error id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_error ALTER COLUMN id SET DEFAULT nextval('public.audit_error_id_seq'::regclass);


--
-- Name: audit_javascript id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_javascript ALTER COLUMN id SET DEFAULT nextval('public.audit_javascript_id_seq'::regclass);


--
-- Name: audit_mail id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_mail ALTER COLUMN id SET DEFAULT nextval('public.audit_mail_id_seq'::regclass);


--
-- Name: audit_trail id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_trail ALTER COLUMN id SET DEFAULT nextval('public.audit_trail_id_seq'::regclass);


--
-- Name: profile user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profile ALTER COLUMN user_id SET DEFAULT nextval('public.profile_user_id_seq'::regclass);


--
-- Name: social_account id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.social_account ALTER COLUMN id SET DEFAULT nextval('public.social_account_id_seq'::regclass);


--
-- Name: user id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);


--
-- Data for Name: audit_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.audit_data (id, entry_id, type, data, created) FROM stdin;
\.


--
-- Name: audit_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.audit_data_id_seq', 1, false);


--
-- Data for Name: audit_entry; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.audit_entry (id, created, user_id, duration, ip, request_method, ajax, route, memory_max) FROM stdin;
\.


--
-- Name: audit_entry_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.audit_entry_id_seq', 1, false);


--
-- Data for Name: audit_error; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.audit_error (id, entry_id, created, message, code, file, line, trace, hash, emailed) FROM stdin;
\.


--
-- Name: audit_error_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.audit_error_id_seq', 1, false);


--
-- Data for Name: audit_javascript; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.audit_javascript (id, entry_id, created, type, message, origin, data) FROM stdin;
\.


--
-- Name: audit_javascript_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.audit_javascript_id_seq', 1, false);


--
-- Data for Name: audit_mail; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.audit_mail (id, entry_id, created, successful, "from", "to", reply, cc, bcc, subject, text, html, data) FROM stdin;
\.


--
-- Name: audit_mail_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.audit_mail_id_seq', 1, false);


--
-- Data for Name: audit_trail; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.audit_trail (id, entry_id, user_id, action, model, model_id, field, old_value, new_value, created) FROM stdin;
\.


--
-- Name: audit_trail_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.audit_trail_id_seq', 1, false);


--
-- Data for Name: auth_assignment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.auth_assignment (item_name, user_id, created_at) FROM stdin;
\.


--
-- Data for Name: auth_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.auth_item (name, type, description, rule_name, data, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: auth_item_child; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.auth_item_child (parent, child) FROM stdin;
\.


--
-- Data for Name: auth_rule; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.auth_rule (name, data, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migration (version, apply_time) FROM stdin;
m000000_000000_base	1551813531
Da\\User\\Migration\\m000000_000001_create_user_table	1551813533
Da\\User\\Migration\\m000000_000002_create_profile_table	1551813533
Da\\User\\Migration\\m000000_000003_create_social_account_table	1551813533
Da\\User\\Migration\\m000000_000004_create_token_table	1551813533
Da\\User\\Migration\\m000000_000005_add_last_login_at	1551813533
Da\\User\\Migration\\m000000_000006_add_two_factor_fields	1551813534
Da\\User\\Migration\\m000000_000007_enable_password_expiration	1551813534
m140506_102106_rbac_init	1551813549
m170907_052038_rbac_add_index_on_auth_assignment_user_id	1551813549
m180523_151638_rbac_updates_indexes_without_prefix	1551813549
m150626_000001_create_audit_entry	1551813566
m150626_000002_create_audit_data	1551813566
m150626_000003_create_audit_error	1551813566
m150626_000004_create_audit_trail	1551813566
m150626_000005_create_audit_javascript	1551813566
m150626_000006_create_audit_mail	1551813566
m150714_000001_alter_audit_data	1551813566
m170126_000001_alter_audit_mail	1551813566
\.


--
-- Data for Name: profile; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.profile (user_id, name, public_email, gravatar_email, gravatar_id, location, website, timezone, bio) FROM stdin;
\.


--
-- Name: profile_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.profile_user_id_seq', 1, false);


--
-- Data for Name: social_account; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.social_account (id, user_id, provider, client_id, code, email, username, data, created_at) FROM stdin;
\.


--
-- Name: social_account_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.social_account_id_seq', 1, false);


--
-- Data for Name: token; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.token (user_id, code, type, created_at) FROM stdin;
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."user" (id, username, email, password_hash, auth_key, unconfirmed_email, registration_ip, flags, confirmed_at, blocked_at, updated_at, created_at, last_login_at, auth_tf_key, auth_tf_enabled, password_changed_at) FROM stdin;
\.


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_id_seq', 1, false);


--
-- Name: audit_data audit_data_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_data
    ADD CONSTRAINT audit_data_pkey PRIMARY KEY (id);


--
-- Name: audit_entry audit_entry_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_entry
    ADD CONSTRAINT audit_entry_pkey PRIMARY KEY (id);


--
-- Name: audit_error audit_error_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_error
    ADD CONSTRAINT audit_error_pkey PRIMARY KEY (id);


--
-- Name: audit_javascript audit_javascript_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_javascript
    ADD CONSTRAINT audit_javascript_pkey PRIMARY KEY (id);


--
-- Name: audit_mail audit_mail_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_mail
    ADD CONSTRAINT audit_mail_pkey PRIMARY KEY (id);


--
-- Name: audit_trail audit_trail_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_trail
    ADD CONSTRAINT audit_trail_pkey PRIMARY KEY (id);


--
-- Name: auth_assignment auth_assignment_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.auth_assignment
    ADD CONSTRAINT auth_assignment_pkey PRIMARY KEY (item_name, user_id);


--
-- Name: auth_item_child auth_item_child_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.auth_item_child
    ADD CONSTRAINT auth_item_child_pkey PRIMARY KEY (parent, child);


--
-- Name: auth_item auth_item_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.auth_item
    ADD CONSTRAINT auth_item_pkey PRIMARY KEY (name);


--
-- Name: auth_rule auth_rule_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.auth_rule
    ADD CONSTRAINT auth_rule_pkey PRIMARY KEY (name);


--
-- Name: migration migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- Name: profile profile_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profile
    ADD CONSTRAINT profile_pkey PRIMARY KEY (user_id);


--
-- Name: social_account social_account_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.social_account
    ADD CONSTRAINT social_account_pkey PRIMARY KEY (id);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: idx-auth_assignment-user_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "idx-auth_assignment-user_id" ON public.auth_assignment USING btree (user_id);


--
-- Name: idx-auth_item-type; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "idx-auth_item-type" ON public.auth_item USING btree (type);


--
-- Name: idx_audit_trail_action; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_audit_trail_action ON public.audit_trail USING btree (action);


--
-- Name: idx_audit_trail_field; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_audit_trail_field ON public.audit_trail USING btree (model, model_id, field);


--
-- Name: idx_audit_user_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_audit_user_id ON public.audit_trail USING btree (user_id);


--
-- Name: idx_emailed; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_emailed ON public.audit_error USING btree (emailed);


--
-- Name: idx_file; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_file ON public.audit_error USING btree (file);


--
-- Name: idx_route; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_route ON public.audit_entry USING btree (route);


--
-- Name: idx_social_account_code; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX idx_social_account_code ON public.social_account USING btree (code);


--
-- Name: idx_social_account_provider_client_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX idx_social_account_provider_client_id ON public.social_account USING btree (provider, client_id);


--
-- Name: idx_token_user_id_code_type; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX idx_token_user_id_code_type ON public.token USING btree (user_id, code, type);


--
-- Name: idx_user_email; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX idx_user_email ON public."user" USING btree (email);


--
-- Name: idx_user_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_user_id ON public.audit_entry USING btree (user_id);


--
-- Name: idx_user_username; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX idx_user_username ON public."user" USING btree (username);


--
-- Name: auth_assignment auth_assignment_item_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.auth_assignment
    ADD CONSTRAINT auth_assignment_item_name_fkey FOREIGN KEY (item_name) REFERENCES public.auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: auth_item_child auth_item_child_child_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.auth_item_child
    ADD CONSTRAINT auth_item_child_child_fkey FOREIGN KEY (child) REFERENCES public.auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: auth_item_child auth_item_child_parent_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.auth_item_child
    ADD CONSTRAINT auth_item_child_parent_fkey FOREIGN KEY (parent) REFERENCES public.auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: auth_item auth_item_rule_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.auth_item
    ADD CONSTRAINT auth_item_rule_name_fkey FOREIGN KEY (rule_name) REFERENCES public.auth_rule(name) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: audit_data fk_audit_data_entry_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_data
    ADD CONSTRAINT fk_audit_data_entry_id FOREIGN KEY (entry_id) REFERENCES public.audit_entry(id);


--
-- Name: audit_error fk_audit_error_entry_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_error
    ADD CONSTRAINT fk_audit_error_entry_id FOREIGN KEY (entry_id) REFERENCES public.audit_entry(id);


--
-- Name: audit_javascript fk_audit_javascript_entry_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_javascript
    ADD CONSTRAINT fk_audit_javascript_entry_id FOREIGN KEY (entry_id) REFERENCES public.audit_entry(id);


--
-- Name: audit_mail fk_audit_mail_entry_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_mail
    ADD CONSTRAINT fk_audit_mail_entry_id FOREIGN KEY (entry_id) REFERENCES public.audit_entry(id);


--
-- Name: audit_trail fk_audit_trail_entry_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.audit_trail
    ADD CONSTRAINT fk_audit_trail_entry_id FOREIGN KEY (entry_id) REFERENCES public.audit_entry(id);


--
-- Name: profile fk_profile_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profile
    ADD CONSTRAINT fk_profile_user FOREIGN KEY (user_id) REFERENCES public."user"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: social_account fk_social_account_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.social_account
    ADD CONSTRAINT fk_social_account_user FOREIGN KEY (user_id) REFERENCES public."user"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: token fk_token_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.token
    ADD CONSTRAINT fk_token_user FOREIGN KEY (user_id) REFERENCES public."user"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

