<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Output student users from simple MySql database">
	    <meta name="author" content="Jon Hunter">
		<title>CISeed Project</title>
		
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		
		<style type="text/css">
			body {
			  padding-top: 20px;
			  padding-bottom: 20px;
			}
			.navbar {
			  margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<div class="container">
		
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="javascript:void(0)">CISeed Project</a>
					</div>
				</div>
			</nav>
			
			<div class="row">
                            <div class="span8">
                                <!--Create a HTML table with id, user_name and password columns-->
                                <table class="table table-bordered" id="student_list">
                                    <thead>
                                        <tr><th>ID</th><th>Name</th><th>Password</th></tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <p id="results"></p>
                            <button class="btn btn-primary" id="randomize">Randomize All User Info</button>
                        </div>
		</div>

	<script>
		(function() {
                    //get the users onload
                    getUsers();

                    //bind button to click event
                    $('#randomize').on('click', function(){
                        $.post('api/randomize_users',
                            {},
                            function(data){
                                //clear table before repopulating it with the new values
                                $("#student_list").find('tbody').empty();

                                //helpful dialog
                                $('#results').html(data);
                                
                                //repopulate the table with changed values
                                getUsers();
                            }
                        );
                    });
		})();
                
                function getUsers(){
                    $.get('api/get_users',
                        {},
                        function(data){
                            var students = $.parseJSON(data);

                            //loop through each user and append the information to the table
                            $.each(students.user, function(id, user){
                                $("#student_list").find('tbody')
                                    .append($('<tr>')
                                        .append($('<td>').text(id))
                                        .append($('<td>').text(user.user_name))
                                        .append($('<td>').text(user.password))
                                    );
                            });
                        }
                    );
                }
	</script>
	
	</body>
</html>