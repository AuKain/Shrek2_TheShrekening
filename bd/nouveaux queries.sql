/*DONE 100%*/


CREATE 
	EVENT events_archive 
	ON SCHEDULE EVERY 1 WEEK STARTS '2011-07-24 03:00:00' 
	DO BEGIN
	
		-- copy deleted posts
		INSERT INTO Events_archive (id, title, content) 
		SELECT id, title, content
		FROM Events
		WHERE deleted = 1;
	    
		-- copy associated audit records
		INSERT INTO Events_audit_archive (id, event_id, changetype, changetime) 
		SELECT Events_audit.id, Events_audit.event_id, Events_audit.changetype, Events_audit.changetime 
		FROM Events_audit
		JOIN Events ON Events_audit.event_id = Events.event_id
		WHERE Events.deleted = 1;
		
		-- remove deleted Events and audit entries
		DELETE FROM Events WHERE deleted = 1;
	    
	END $$

CREATE
	TRIGGER events_after_insert AFTER INSERT 
	ON Events 
	FOR EACH ROW BEGIN
	
		IF NEW.deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'NEW';
		END IF;
    
		INSERT INTO Events_audit (event_id, changetype) VALUES (NEW.event_id, @changetype);
		
    END$$

CREATE
	TRIGGER events_after_update AFTER UPDATE 
	ON Events
	FOR EACH ROW BEGIN
	
		IF NEW.deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'EDIT';
		END IF;
    
		INSERT INTO Events_audit (event_id, changetype) VALUES (NEW.event_id, @changetype);
		
    END$$

/*la table Events*/

create table if not exists Events_archive (
    event_id int not null primary key,
    event_name varchar(30) not null,
    place_id int,
    player_id int,
    event_description varchar(255),
    other_event_details varchar(255)
);

Create table if not exists Events_audit_archive (
    id int not null primary key,
    event_id int not null, 
    changetype enum('NEW', 'EDIT', 'DELETE'),
    changetime timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    constraint FK_EventsAuditArchiveId foreign key (event_id) references Events_archive(event_id) ON DELETE CASCADE ON UPDATE CASCADE,
    key ix_event_id (event_id),
    key ix_changetype (changetype),
    key ix_changetime (changetime)
);

Create table if not exists Events_audit (
    id int not null primary key auto_increment,
    event_id int not null, 
    changetype enum('NEW', 'EDIT', 'DELETE'),
    changetime timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    constraint FK_EventsAuditId foreign key (event_id) references Events(event_id) ON DELETE CASCADE ON UPDATE CASCADE,
    key ix_event_id (event_id),
    key ix_changetype (changetype),
    key ix_changetime (changetime)
);