package flexUnitTests
{
	import flash.net.ObjectEncoding;
	
	import flexunit.framework.TestCase;
	
	import org.amfphp.test.EnhancedNetConnection;
	import org.amfphp.test.ObjEvent;

	public class Amf3NumberTests extends TestCase
	{		
		
		protected var _nc:EnhancedNetConnection;
		
		[Before]
		override public function setUp():void
		{
			
			_nc = new EnhancedNetConnection();
			_nc.objectEncoding = ObjectEncoding.AMF3;
			_nc.connect(TestConfig.NC_GATEWAY_URL);
			
		}
		
		public function testMinusOne():void{
			_nc.addEventListener(EnhancedNetConnection.EVENT_ONRESULT, addAsync(verifyReturnMinusOne, 1000));
			var testVar:int = -1;
			_nc.simpleCall("MirrorService/returnOneParam", testVar);	
			
		}
		
		private function verifyReturnMinusOne(event:ObjEvent):void{
			assertTrue(event.obj is int);
			assertEquals(-1, event.obj);
		}
			
	}
}