
public class StringTest {

	public static void main(String[] args) {
		String str1 = "Hello, world";
		String str2 = "Hello, " + "world";
		String str3 = new String("Hello, world");

		if (str1 == str2) {
			System.out.println("str1 == str2");
		}

		if (str1 == str3) {
			System.out.println("str1 == str3");
		}
		
		if (str3 == str2) {
			System.out.println("str3 == str2");
		}
		
		if (str3.equals(str2)) {
			System.out.println("str3.equals(str2)");
		}
	}
}
