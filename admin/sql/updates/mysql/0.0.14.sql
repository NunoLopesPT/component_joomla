
CREATE TABLE `#__students` (
  id          INT PRIMARY KEY,
  name        VARCHAR(50) NOT NULL,
  id_degree   INT         NOT NULL,
  year        INT         NOT NULL,
  observation VARCHAR(255)
);