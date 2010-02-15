CREATE TABLE answer (id BIGINT AUTO_INCREMENT, author_id BIGINT, reply_id BIGINT, question_id BIGINT, comment TEXT, answer TEXT, question TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX author_id_idx (author_id), INDEX question_id_idx (question_id), INDEX reply_id_idx (reply_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE author (id BIGINT AUTO_INCREMENT, name VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE question (id BIGINT AUTO_INCREMENT, question TEXT, answer TEXT, best_id BIGINT, branch_id BIGINT, author_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX sluggable_idx (slug), INDEX best_id_idx (best_id), INDEX branch_id_idx (branch_id), INDEX author_id_idx (author_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE question_relation (from_id BIGINT, to_id BIGINT, PRIMARY KEY(from_id, to_id)) ENGINE = INNODB;
CREATE TABLE question_tag (question_id BIGINT, tag_id BIGINT, PRIMARY KEY(question_id, tag_id)) ENGINE = INNODB;
CREATE TABLE tag (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, slug VARCHAR(255), UNIQUE INDEX sluggable_idx (slug), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE answer ADD CONSTRAINT answer_reply_id_answer_id FOREIGN KEY (reply_id) REFERENCES answer(id);
ALTER TABLE answer ADD CONSTRAINT answer_question_id_question_id FOREIGN KEY (question_id) REFERENCES question(id);
ALTER TABLE answer ADD CONSTRAINT answer_author_id_author_id FOREIGN KEY (author_id) REFERENCES author(id);
ALTER TABLE question ADD CONSTRAINT question_branch_id_answer_id FOREIGN KEY (branch_id) REFERENCES answer(id);
ALTER TABLE question ADD CONSTRAINT question_best_id_answer_id FOREIGN KEY (best_id) REFERENCES answer(id);
ALTER TABLE question ADD CONSTRAINT question_author_id_author_id FOREIGN KEY (author_id) REFERENCES author(id);
ALTER TABLE question_relation ADD CONSTRAINT question_relation_from_id_question_id FOREIGN KEY (from_id) REFERENCES question(id);
ALTER TABLE question_tag ADD CONSTRAINT question_tag_tag_id_tag_id FOREIGN KEY (tag_id) REFERENCES tag(id);
ALTER TABLE question_tag ADD CONSTRAINT question_tag_question_id_question_id FOREIGN KEY (question_id) REFERENCES question(id);
