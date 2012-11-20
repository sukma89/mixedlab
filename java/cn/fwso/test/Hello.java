package cn.fwso.test;

public class Hello {
	
	private String name;
	private String message;

	public Hello (String name, String message) {
		this.name = name;
		this.message = message;
	}

	public String getName () {
		return this.name;
	}

	public String getMessage () {
		return this.message;
	}

	public void speak () {
		System.out.println("My Name is " + this.name + " : " 
				+ this.message);
	}

	public static void main(String[] args) {
		Hello h = new Hello(args[0], args[1]);
		h.speak();
	}
}
