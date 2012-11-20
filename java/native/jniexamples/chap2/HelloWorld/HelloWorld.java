class HelloWorld {
    private native void print();
	public native String getString();
    public static void main(String[] args) {
        HelloWorld hw = new HelloWorld();
		hw.print();
		System.out.println("Hello: " + hw.getString());
    }
    static {
        System.loadLibrary("HelloWorld");
    }
}
