


CREATE SCHEMA  "eLearningProject"   ;

CREATE TABLE  "eLearningProject"."links" (
  "id" INT NOT NULL ,
  "courseId" INT NULL,
  "name" VARCHAR(100) NULL,
  PRIMARY KEY ("id")
    CONSTRAINT "fCourseId_links"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."users" (
  "id" INT NOT NULL ,
  "firstname" VARCHAR(45) NULL,
  "lastname" VARCHAR(45) NULL,
  "email" VARCHAR(50) NULL,
  "password" VARCHAR(50) NULL,
  "createdDate" TIMESTAMP NULL,
  "updatedDate" TIMESTAMP NULL,
  PRIMARY KEY ("id"));

CREATE TABLE  "eLearningProject"."catagories" (
  "id" INT NOT NULL ,
  "name" VARCHAR(30) NULL,
  PRIMARY KEY ("id"));


CREATE TABLE  "eLearningProject"."courses" (
  "id" INT NOT NULL ,
  "name" VARCHAR(200) NULL,
  "instructorId" INT NULL,
  "catagoryId" INT NULL,
  "price" VARCHAR(10) NULL,
  "createdDate" TIMESTAMP NULL,
  "updatedDate" TIMESTAMP NULL,
  "isActive" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fCatagoryId_courses"
    FOREIGN KEY ("catagoryId")
    REFERENCES "eLearningProject"."catagories" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fInstructorId_courses"
    FOREIGN KEY ("instructorId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."chapters" (
  "id" INT NOT NULL ,
  "name" VARCHAR(45) NULL,
  "no" INT NULL,
  "courseId" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fCourseId_chapters"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."courseDetails" (
  "id" INT NOT NULL ,
  "courseId" INT NULL,
  "summary" VARCHAR(1000) NULL,
  "objectives" VARCHAR(1000) NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fCourseId_courseDetails"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."courseToUser" (
  "id" INT NOT NULL ,
  "courseId" INT NULL,
  "userId" INT NULL,
  "date" TIMESTAMP NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fCourseId_c2u"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fUserId_c2u"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."educationLevels" (
  "id" INT NOT NULL ,
  "name" VARCHAR(30) NULL,
  PRIMARY KEY ("id"));

CREATE TABLE  "eLearningProject"."lessonLegends" (
  "id" INT NOT NULL ,
  "name" VARCHAR(30) NULL,
  PRIMARY KEY ("id"));


CREATE TABLE  "eLearningProject"."documentTypes" (
  "id" INT NOT NULL ,
  "name" VARCHAR(45) NULL,
  PRIMARY KEY ("id"));


CREATE TABLE  "eLearningProject"."lessons" (
  "id" INT NOT NULL ,
  "chapterId" INT NULL,
  "name" VARCHAR(200) NULL,
  "duration" VARCHAR(10) NULL,
  "typeId" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fLessonTypeId_lessons"
    FOREIGN KEY ("typeId")
    REFERENCES "eLearningProject"."documentTypes" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fChapterId_lessons"
    FOREIGN KEY ("chapterId")
    REFERENCES "eLearningProject"."chapters" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE  "eLearningProject"."lessonProgress" (
  "id" INT NOT NULL ,
  "userId" INT NULL,
  "lessonId" INT NULL,
  "lessonLegendId" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUserId_lessonProgress"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fLessonId_lessonProgress"
    FOREIGN KEY ("lessonId")
    REFERENCES "eLearningProject"."lessons" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fLessenLegendId_lessonProgress"
    FOREIGN KEY ("lessonLegendId")
    REFERENCES "eLearningProject"."lessonLegends" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."occupations" (
  "id" INT NOT NULL ,
  "name" VARCHAR(30) NULL,
  PRIMARY KEY ("id"));


CREATE TABLE  "eLearningProject"."paymentProcess" (
  "id" INT NOT NULL ,
  "userId" INT NULL,
  "courseId" INT NULL,
  "situation" VARCHAR(200) NULL,
  "date" TIMESTAMP NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUserId_paymentProcess"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fCourseId_paymentProcess"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE  "eLearningProject"."userTypes" (
  "id" INT NOT NULL ,
  "name" VARCHAR(20) NULL,
  PRIMARY KEY ("id"));


CREATE TABLE  "eLearningProject"."ratings" (
  "id" INT NOT NULL ,
  "courseId" INT NULL,
  "stars" VARCHAR(1) NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fCourseId_ratings"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE  "eLearningProject"."examTypes" (
  "id" INT NOT NULL ,
  "name" VARCHAR(45) NULL,
  PRIMARY KEY ("id"));

CREATE TABLE  "eLearningProject"."examProcess" (
  "id" INT NOT NULL ,
  "userId" INT NULL,
  "chapterId" INT NULL,
  "isSuccess" INT NULL,
  "Grade" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUserId_examProcess"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "ChapterId_examProcess"
    FOREIGN KEY ("chapterId")
    REFERENCES "eLearningProject"."chapters" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."documents" (
  "id" INT NOT NULL,
  "documentTypeId" INT NULL,
  "courseId" INT NULL,
  "lessonId" INT NULL,
  "createdDate" TIMESTAMP NULL,
  "uploadedDate" TIMESTAMP NULL,
  "explanation" VARCHAR(300) NULL,
  "name" VARCHAR(200) NULL,
  "isAsset" INT NULL DEFAULT 0,
  PRIMARY KEY ("id"),
  CONSTRAINT "fLessonId_doc"
    FOREIGN KEY ("lessonId")
    REFERENCES "eLearningProject"."lessons" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fDocumentTypeId_doc"
    FOREIGN KEY ("documentTypeId")
    REFERENCES "eLearningProject"."documentTypes" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fCourseId_doc"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



CREATE TABLE  "eLearningProject"."userDetails" (
  "userId" INT NULL,
  "age" VARCHAR(2) NULL,
  "phone" VARCHAR(15) NULL,
  "typeId" INT NULL,
  "occupationId" INT NULL,
  "educationId" INT NULL,
  "fbUserName" VARCHAR(45) NULL,
  "twUserName" VARCHAR(45) NULL,
  "about" VARCHAR(1000) NULL,
  "profileImageURL" VARCHAR(200) NULL,
  "tcNo" VARCHAR(11) NULL,
  "address" VARCHAR(1000) NULL,
  "gender" VARCHAR(1) NULL,
  CONSTRAINT "fOccupationId_uD"
    FOREIGN KEY ("occupationId")
    REFERENCES "eLearningProject"."occupations" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fEducationLevelId_uD"
    FOREIGN KEY ("educationId")
    REFERENCES "eLearningProject"."educationLevels" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fUserTypeId_uD"
    FOREIGN KEY ("typeId")
    REFERENCES "eLearningProject"."userTypes" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fUserId_uD"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."comments" (
  "id" INT NOT NULL ,
  "userId" INT NULL,
  "permission" INT NULL,
  "courseId" INT NULL,
  "createdDate" TIMESTAMP NULL,
  "updatedDate" TIMESTAMP NULL,
  "isActive" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUserId_comments"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fCourseId_comments"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."discussions" (
  "id" INT NOT NULL ,
  "userId" INT NULL,
  "courseId" INT NULL,
  "title" VARCHAR(45) NULL,
  "createdDate" VARCHAR(45) NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUserId_discussions"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fCourseId_discussions"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."posts" (
  "id" INT NOT NULL ,
  "userId" INT NULL,
  "discussionId" INT NULL,
  "createdDate" VARCHAR(45) NULL,
  "updatedDate" VARCHAR(45) NULL,
  "content" VARCHAR(2000) NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUserId_posts"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fDisscussionId_posts"
    FOREIGN KEY ("discussionId")
    REFERENCES "eLearningProject"."discussions" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."questions" (
  "id" INT NOT NULL ,
  "question" VARCHAR(45) NULL,
  "correctAnswer" VARCHAR(45) NULL,
  "duration" INT NULL,
  "examTypeId" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fExamTypeId_questions"
    FOREIGN KEY ("examTypeId")
    REFERENCES "eLearningProject"."examTypes" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."exams" (
  "id" INT NOT NULL ,
  "questionId" INT NULL,
  "createdDate" TIMESTAMP NULL,
  "updatedDate" TIMESTAMP NULL,
  "InstructorId" INT NULL,
  "chapterId" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fInstructorId_exams"
    FOREIGN KEY ("questionId")
    REFERENCES "eLearningProject"."questions" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fChapterId_exams"
    FOREIGN KEY ("chapterId")
    REFERENCES "eLearningProject"."chapters" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."cities" (
  "id" INT NOT NULL ,
  "name" VARCHAR(45) NULL,
  PRIMARY KEY ("id"));


CREATE TABLE  "eLearningProject"."universities" (
  "id" INT NOT NULL ,
  "name" VARCHAR(45) NULL,
  "cityId" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fCity_universities"
    FOREIGN KEY ("cityId")
    REFERENCES "eLearningProject"."cities" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE  "eLearningProject"."sems" (
  "id" INT NOT NULL ,
  "personalName" VARCHAR(45) NULL,
  "personalSurname" VARCHAR(45) NULL,
  "email" VARCHAR(45) NULL,
  "telephone" VARCHAR(45) NULL,
  "universityId" INT NULL,
  "createdDate" TIMESTAMP NULL,
  "updatedDate" TIMESTAMP NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUniversity_sems"
    FOREIGN KEY ("universityId")
    REFERENCES "eLearningProject"."universities" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."views" (
  "id" INT NOT NULL ,
  "viewerId" INT NULL,
  "documentId" INT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fViewerId_v"
    FOREIGN KEY ("viewerId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fDocumentId_v"
    FOREIGN KEY ("documentId")
    REFERENCES "eLearningProject"."documents" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."IPTables" (
  "id" INT NOT NULL ,
  "userId" INT NULL,
  "IP" VARCHAR(15) NULL,
  "where" VARCHAR(100) NULL,
  "date" TIMESTAMP NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUserId_IP"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."bills" (
  "id" INT NOT NULL ,
  "billNo" VARCHAR(10) NULL,
  "courseId" INT NULL,
  "userId" INT NULL,
  "createdDate" TIMESTAMP NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fUserId_bill"
    FOREIGN KEY ("userId")
    REFERENCES "eLearningProject"."users" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT "fCourseId_bill"
    FOREIGN KEY ("courseId")
    REFERENCES "eLearningProject"."courses" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE  "eLearningProject"."tags" (
  "id" INT NOT NULL ,
  "lessonId" INT NULL,
  "name" VARCHAR(45) NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fLessonId_t"
    FOREIGN KEY ("lessonId")
    REFERENCES "eLearningProject"."lessons" ("id")
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


DROP SEQUENCE IF EXISTS "eLearningProject.users_id_sequence";
CREATE SEQUENCE  "eLearningProject.users_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.catagories_id_sequence";
CREATE SEQUENCE  "eLearningProject.catagories_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.courses_id_sequence";
CREATE SEQUENCE  "eLearningProject.courses_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.chapters_id_sequence";
CREATE SEQUENCE  "eLearningProject.chapters_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.courseDetails_id_sequence";
CREATE SEQUENCE  "eLearningProject.courseDetails_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.courseToUser_id_sequence";
CREATE SEQUENCE  "eLearningProject.courseToUser_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.educationLevels_id_sequence";
CREATE SEQUENCE  "eLearningProject.educationLevels_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.lessonLegends_id_sequence";
CREATE SEQUENCE  "eLearningProject.lessonLegends_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.documentTypes_id_sequence";
CREATE SEQUENCE  "eLearningProject.documentTypes_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.lessons_id_sequence";
CREATE SEQUENCE  "eLearningProject.lessons_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.lessonProgress_id_sequence";
CREATE SEQUENCE  "eLearningProject.lessonProgress_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.occupations_id_sequence";
CREATE SEQUENCE  "eLearningProject.occupations_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.paymentProcess_id_sequence";
CREATE SEQUENCE  "eLearningProject.paymentProcess_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.userTypes_id_sequence";
CREATE SEQUENCE  "eLearningProject.userTypes_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.ratings_id_sequence";
CREATE SEQUENCE  "eLearningProject.ratings_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.examTypes_id_sequence";
CREATE SEQUENCE  "eLearningProject.examTypes_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.examProcess_id_sequence";
CREATE SEQUENCE  "eLearningProject.examProcess_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.comments_id_sequence";
CREATE SEQUENCE  "eLearningProject.comments_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.discussions_id_sequence";
CREATE SEQUENCE  "eLearningProject.discussions_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.posts_id_sequence";
CREATE SEQUENCE  "eLearningProject.posts_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.questions_id_sequence";
CREATE SEQUENCE  "eLearningProject.questions_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.exams_id_sequence";
CREATE SEQUENCE  "eLearningProject.exams_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.cities_id_sequence";
CREATE SEQUENCE  "eLearningProject.cities_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.universities_id_sequence";
CREATE SEQUENCE  "eLearningProject.universities_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.sems_id_sequence";
CREATE SEQUENCE  "eLearningProject.sems_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.views_id_sequence";
CREATE SEQUENCE  "eLearningProject.views_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.IPTables_id_sequence";
CREATE SEQUENCE  "eLearningProject.IPTables_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.bills_id_sequence";
CREATE SEQUENCE  "eLearningProject.bills_id_sequence";
DROP SEQUENCE IF EXISTS "eLearningProject.tags_id_sequence";
CREATE SEQUENCE  "eLearningProject.tags_id_sequence";
