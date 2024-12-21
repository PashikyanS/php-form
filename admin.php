<?php
?>
<h2>Add Student Assessment</h2>

        <form class="add" method="POST" action="studentrequest.php">
            <div class="firstlastname">
                <div>
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required >
                </div>

                <div>
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname"  required>
                </div>
            </div>

            <div class="coursefaculty">
                <div>
                    <label for="course">Select Course</label>
                    <select id="course" name="course" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div>
                    <label for="faculty">Select Faculty</label>
                    <select id="faculty" name="faculty" required>
                        <option value="Natural science">Natural science</option>
                        <option value="Finance">Finance</option>
                        <option value="Humanitarian">Humanitarian</option>
                        <option value="Tourism">Tourism</option>
                    </select>
                </div>
            </div>

            <div class="assess">
                <div>
                    <label for="grade">Grade</label>
                    <input type="number" id="grade" name="grade" min="0" max="20" required>
                </div>
                <button name="submit" type="submit" class="btn">Enter</button>
            </div>

        </form>