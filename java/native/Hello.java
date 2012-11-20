
public class Hello {

	public native int getNumber ();

	static {
		System.loadLibrary("hello");
	}
}
