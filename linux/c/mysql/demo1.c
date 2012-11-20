/*
 * Compile:
 * gcc demo1.c `mysql_config --cflags --libs`
 */
#include <my_global.h>
#include <mysql.h>

int main(int argc, char **argv) 
{
	MYSQL *conn;
	MYSQL_RES *result;
	MYSQL_ROW row;
	MYSQL_FIELD *fields;
	int num_fields;
	int i;

	conn = mysql_init(NULL);
	
	printf("MySQL client version: %s\n", mysql_get_client_info());

	if (conn == NULL) {
		printf("Error %u: %s\n", mysql_errno(conn), mysql_error(conn));
		exit(1);
	}

	if (mysql_real_connect(conn, "localhost", "root", "123456", NULL, 0,
				NULL, 0) == NULL) {
		printf("Error %u: %s\n", mysql_errno(conn), mysql_error(conn));
		exit(1);
	}

	/*	
	if (mysql_query(conn, "CREATE DATABASE demo1")) {
		printf("Error %u: %s\n", mysql_errno(conn), mysql_error(conn));
		exit(1);
	}*/

	if (mysql_select_db(conn, "demo1")) {
		printf("Error %u: %s\n", mysql_errno(conn), mysql_error(conn));
		exit(1);
	}

	if (!mysql_query(conn, "SELECT * FROM users LIMIT 10")) {

		result = mysql_store_result(conn);
		num_fields = mysql_num_fields(result);

		printf("%lld rows retrived\n", mysql_num_rows(result));

		fields = mysql_fetch_fields(result);

		printf("%s\t\t%s\t\t%s\n", fields[0].name, fields[1].name, 
				fields[8].name);
		
		while ( (row = mysql_fetch_row(result)) ) {
			printf("%s\t\t%s\t\t%s\n", row[0], row[1], row[8]);
		}	

		mysql_free_result(result);

	} else {
		printf("Error %u: %s\n", mysql_errno(conn), mysql_error(conn));
		exit(1);
	}		

	mysql_close(conn);

	return 0;
}

