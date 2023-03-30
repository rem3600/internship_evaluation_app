<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
}
-- CREATE PROCEDURE
CREATE PROCEDURE Evaluation (
    IN student_first_name VARCHAR(50),
    IN student_last_name VARCHAR(50),
    IN student_email VARCHAR(100),
    IN student_phone VARCHAR(20),
    IN student_address VARCHAR(200)
)
BEGIN
    INSERT INTO evaluation (student_first_name, student_last_name, student_email, student_phone, student_address)
    VALUES (student_first_name, student_last_name, student_email, student_phone, student_address);
END;

-- READ PROCEDURE
CREATE PROCEDURE select_student (
    IN id INT
)
BEGIN
    SELECT * FROM evaluation
    WHERE student_id = id;
END;

-- UPDATE PROCEDURE
CREATE PROCEDURE update_student (
    IN id INT,
    IN student_first_name VARCHAR(50),
    IN student_last_name VARCHAR(50),
    IN student_email VARCHAR(100),
    IN student_phone VARCHAR(20),
    IN student_address VARCHAR(200)
)
BEGIN
    UPDATE evaluations
    SET student_first_name = first_name,
        student_last_name = last_name,
        student_email = email,
        student_phone = phone,
        student_address = address
    WHERE customer_id = id;
END;

-- DELETE PROCEDURE
CREATE PROCEDURE delete_student (
    IN id INT
)
BEGIN
    DELETE FROM evaluation
    WHERE student_id = id;
END;