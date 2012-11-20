package cn.fwso.test;

import java.util.Scanner;

public class Test {
	
	public static void sayHello (String name) {
		System.out.println("Hello, " + name);
	}
	
	public static void main(String[] args) {
		
		Scanner in = new Scanner(System.in);
		
		System.out.print(" > ");
		
		String name = in.nextLine().trim();
		
		Test.sayHello(name);
	}
}