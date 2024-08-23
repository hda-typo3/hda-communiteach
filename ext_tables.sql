CREATE TABLE tx_hdacommuniteach_domain_model_specialistcluster (
	title varchar(255) NOT NULL DEFAULT '',
	abbreviation varchar(255) NOT NULL DEFAULT '',
	icon varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_hdacommuniteach_domain_model_eventformat (
	title varchar(255) NOT NULL DEFAULT '',
	icon varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_hdacommuniteach_domain_model_eventmode (
	title varchar(255) NOT NULL DEFAULT '',
	icon varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_hdacommuniteach_domain_model_didacticconcept (
	title varchar(255) NOT NULL DEFAULT '',
	icon varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_hdacommuniteach_domain_model_activity (
	title varchar(255) NOT NULL DEFAULT '',
	subtitle varchar(255) NOT NULL DEFAULT '',
	teaser text NOT NULL DEFAULT '',
	image int(11) unsigned NOT NULL DEFAULT '0',
	publication_date date DEFAULT NULL,
	link varchar(255) NOT NULL DEFAULT '',
	didactic_concepts int(11) unsigned NOT NULL DEFAULT '0',
	event_formats int(11) unsigned NOT NULL DEFAULT '0',
	event_mode int(11) unsigned DEFAULT '0',
	specialist_clusters int(11) unsigned DEFAULT '0'
);
