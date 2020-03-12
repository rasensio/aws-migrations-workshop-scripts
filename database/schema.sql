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

INSERT INTO public.country VALUES (1, 'Afghanistan', now());
INSERT INTO public.country VALUES (2, 'Algeria', now());
INSERT INTO public.country VALUES (3, 'American Samoa', now());
INSERT INTO public.country VALUES (4, 'Angola', now());
INSERT INTO public.country VALUES (5, 'Anguilla', now());
INSERT INTO public.country VALUES (6, 'Argentina', now());
INSERT INTO public.country VALUES (7, 'Armenia', now());
INSERT INTO public.country VALUES (8, 'Australia', now());
INSERT INTO public.country VALUES (9, 'Austria', now());
INSERT INTO public.country VALUES (10, 'Azerbaijan', now());
INSERT INTO public.country VALUES (11, 'Bahrain', now());
INSERT INTO public.country VALUES (12, 'Bangladesh', now());
INSERT INTO public.country VALUES (13, 'Belarus', now());
INSERT INTO public.country VALUES (14, 'Bolivia', now());
INSERT INTO public.country VALUES (15, 'Brazil', now());
INSERT INTO public.country VALUES (16, 'Brunei', now());
INSERT INTO public.country VALUES (17, 'Bulgaria', now());
INSERT INTO public.country VALUES (18, 'Cambodia', now());
INSERT INTO public.country VALUES (19, 'Cameroon', now());
INSERT INTO public.country VALUES (20, 'Canada', now());
INSERT INTO public.country VALUES (21, 'Chad', now());
INSERT INTO public.country VALUES (22, 'Chile', now());
INSERT INTO public.country VALUES (23, 'China', now());
INSERT INTO public.country VALUES (24, 'Colombia', now());
INSERT INTO public.country VALUES (25, 'Congo, The Democratic Republic of the', now());
INSERT INTO public.country VALUES (26, 'Czech Republic', now());
INSERT INTO public.country VALUES (27, 'Dominican Republic', now());
INSERT INTO public.country VALUES (28, 'Ecuador', now());
INSERT INTO public.country VALUES (29, 'Egypt', now());
INSERT INTO public.country VALUES (30, 'Estonia', now());
INSERT INTO public.country VALUES (31, 'Ethiopia', now());
INSERT INTO public.country VALUES (32, 'Faroe Islands', now());
INSERT INTO public.country VALUES (33, 'Finland', now());
INSERT INTO public.country VALUES (34, 'France', now());
INSERT INTO public.country VALUES (35, 'French Guiana', now());
INSERT INTO public.country VALUES (36, 'French Polynesia', now());
INSERT INTO public.country VALUES (37, 'Gambia', now());
INSERT INTO public.country VALUES (38, 'Germany', now());
INSERT INTO public.country VALUES (39, 'Greece', now());
INSERT INTO public.country VALUES (40, 'Greenland', now());
INSERT INTO public.country VALUES (41, 'Holy See (Vatican City State)', now());
INSERT INTO public.country VALUES (42, 'Hong Kong', now());
INSERT INTO public.country VALUES (43, 'Hungary', now());
INSERT INTO public.country VALUES (44, 'India', now());
INSERT INTO public.country VALUES (45, 'Indonesia', now());
INSERT INTO public.country VALUES (46, 'Iran', now());
INSERT INTO public.country VALUES (47, 'Iraq', now());
INSERT INTO public.country VALUES (48, 'Israel', now());
INSERT INTO public.country VALUES (49, 'Italy', now());
INSERT INTO public.country VALUES (50, 'Japan', now());
INSERT INTO public.country VALUES (51, 'Kazakstan', now());
INSERT INTO public.country VALUES (52, 'Kenya', now());
INSERT INTO public.country VALUES (53, 'Kuwait', now());
INSERT INTO public.country VALUES (54, 'Latvia', now());
INSERT INTO public.country VALUES (55, 'Liechtenstein', now());
INSERT INTO public.country VALUES (56, 'Lithuania', now());
INSERT INTO public.country VALUES (57, 'Madagascar', now());
INSERT INTO public.country VALUES (58, 'Malawi', now());
INSERT INTO public.country VALUES (59, 'Malaysia', now());
INSERT INTO public.country VALUES (60, 'Mexico', now());
INSERT INTO public.country VALUES (61, 'Moldova', now());
INSERT INTO public.country VALUES (62, 'Morocco', now());
INSERT INTO public.country VALUES (63, 'Mozambique', now());
INSERT INTO public.country VALUES (64, 'Myanmar', now());
INSERT INTO public.country VALUES (65, 'Nauru', now());
INSERT INTO public.country VALUES (66, 'Nepal', now());
INSERT INTO public.country VALUES (67, 'Netherlands', now());
INSERT INTO public.country VALUES (68, 'New Zealand', now());
INSERT INTO public.country VALUES (69, 'Nigeria', now());
INSERT INTO public.country VALUES (70, 'North Korea', now());
INSERT INTO public.country VALUES (71, 'Oman', now());
INSERT INTO public.country VALUES (72, 'Pakistan', now());
INSERT INTO public.country VALUES (73, 'Paraguay', now());
INSERT INTO public.country VALUES (74, 'Peru', now());
INSERT INTO public.country VALUES (75, 'Philippines', now());
INSERT INTO public.country VALUES (76, 'Poland', now());
INSERT INTO public.country VALUES (77, 'Puerto Rico', now());
INSERT INTO public.country VALUES (78, 'Romania', now());
INSERT INTO public.country VALUES (79, 'Runion', now());
INSERT INTO public.country VALUES (80, 'Russian Federation', now());
INSERT INTO public.country VALUES (81, 'Saint Vincent and the Grenadines', now());
INSERT INTO public.country VALUES (82, 'Saudi Arabia', now());
INSERT INTO public.country VALUES (83, 'Senegal', now());
INSERT INTO public.country VALUES (84, 'Slovakia', now());
INSERT INTO public.country VALUES (85, 'South Africa', now());
INSERT INTO public.country VALUES (86, 'South Korea', now());
INSERT INTO public.country VALUES (87, 'Spain', now());
INSERT INTO public.country VALUES (88, 'Sri Lanka', now());
INSERT INTO public.country VALUES (89, 'Sudan', now());
INSERT INTO public.country VALUES (90, 'Sweden', now());
INSERT INTO public.country VALUES (91, 'Switzerland', now());
INSERT INTO public.country VALUES (92, 'Taiwan', now());
INSERT INTO public.country VALUES (93, 'Tanzania', now());
INSERT INTO public.country VALUES (94, 'Thailand', now());
INSERT INTO public.country VALUES (95, 'Tonga', now());
INSERT INTO public.country VALUES (96, 'Tunisia', now());
INSERT INTO public.country VALUES (97, 'Turkey', now());
INSERT INTO public.country VALUES (98, 'Turkmenistan', now());
INSERT INTO public.country VALUES (99, 'Tuvalu', now());
INSERT INTO public.country VALUES (100, 'Ukraine', now());
INSERT INTO public.country VALUES (101, 'United Arab Emirates', now());
INSERT INTO public.country VALUES (102, 'United Kingdom', now());
INSERT INTO public.country VALUES (103, 'United States', now());
INSERT INTO public.country VALUES (104, 'Venezuela', now());
INSERT INTO public.country VALUES (105, 'Vietnam', now());
INSERT INTO public.country VALUES (106, 'Virgin Islands, U.S.', now());
INSERT INTO public.country VALUES (107, 'Yemen', now());
INSERT INTO public.country VALUES (108, 'Yugoslavia', now());
INSERT INTO public.country VALUES (109, 'Zambia', now());