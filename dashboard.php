<div class="w-60 h-full bg-blue-50 min-h-screen shadow-xl">
    <ul class="relative">
        <li class="relative">
            <a class="flex items-center text-xl py-8 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap bg-blue-600 hover:bg-blue-500"
                href="main.php">
                Dashboard
            </a>
        </li>
        <form>
            <label for="library"></label>
            <select onchange="location = this.value">
                <option class="relative" value = "main.php">
                    Select Here
                </option>
                <optgroup label="Library">

                    <option class="relative" value="insert_library.php">
                        Insert a Library
                    </option>
                    <option class="relative" value="select_library.php">
                        Select a Library
                    </option>
                    <option class="relative" value="update_library.php">
                        Update a Library
                    </option>
                    <option class="relative" value="delete_library.php">
                        Delete a Library
                    </option>
                </optgroup>
                <optgroup label="Book">
                    <option class="relative" value="insert_book.php">
                        Insert a Book
                    </option>
                    <option class="relative" value="select_book.php">
                        Select a Book
                    </option>
                    <option class="relative" value="update_book.php">
                        Update a Book
                    </option>
                    <option class="relative" value="delete_book.php">
                        Delete a Book
                    </option>
                </optgroup>
                <optgroup label="Person">
                    <option class="relative" value="insert_person.php">
                        Insert a Person
                    </option>
                    <option class="relative" value="select_person.php">
                        Select a Person
                    </option>
                    <option class="relative" value="update_person.php">
                        Update a Person
                    </option>
                    <option class="relative" value="delete_person.php">
                        Delete a Person
                    </option>
                </optgroup>
                <optgroup label="Member">
                    <option class="relative" value="insert_member.php">
                        Insert Member
                    </option>
                    <option class="relative" value="member_status.php">
                        Member Status (Multi-Query)
                    </option>
                    <option class="relative" value="update_member.php">
                        Update a Member
                    </option>
                    <option class="relative" value="delete_member.php">
                        Delete a Member
                    </option>
                </optgroup>
                <optgroup label="Staff">
                    <option class="relative" value="insert_staff.php">
                        Insert Staff
                    </option>
                    <option class="relative" value="staff_status.php">
                        Staff Status
                    </option>
                    <option class="relative" value="update_staff.php">
                        Update a Staff member
                    </option>
                    <option class="relative" value="delete_staff.php">
                        Delete a Staff Member
                    </option>
                </optgroup>
                <optgroup label="Checkout">
                    <option class="relative" value="checks_out.php">
                        Book Checkout
                    </option>
                    <option class="relative" value="checks_out_return.php">
                        Book Return
                    </option>
                </optgroup>
            </select>
        </form>
    </ul>
</div>