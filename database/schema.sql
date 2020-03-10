--------------------------------------------
-- @author: @rasensio
-- @date: 03/10/2020
--------------------------------------------

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET default_tablespace = '';
SET default_with_oids = false;

DROP TABLE IF EXISTS public.country;

CREATE TABLE public.country (
	country_id serial NOT NULL,
	country varchar(50) NOT NULL,
	last_update timestamp NOT NULL DEFAULT now(),
	CONSTRAINT country_pkey PRIMARY KEY (country_id)
);