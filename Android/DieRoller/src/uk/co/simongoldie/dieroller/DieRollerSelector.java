package uk.co.simongoldie.dieroller;

import java.util.Random;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.media.MediaPlayer;
import android.os.Bundle;
import android.text.Html;
import android.text.format.Time;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Spinner;
import android.widget.Toast;

//public class DieRollerSelector extends Activity implements OnClickListener, OnItemSelectedListener {
public class DieRollerSelector extends Activity implements OnClickListener {

	int d4count=0;
	EditText editText1;
	
	int d6count=0;
	EditText editText2;
	
	int d8count=0;
	EditText editText3;
	
	int d10count=0;
	EditText editText4;
	
	int d12count=0;
	EditText editText5;
	
	int d20count=0;
	EditText editText6;
	
	int d100count=0;
	EditText editText7;
	
	Spinner spinner_d8;
	Spinner spinner_d10;
	Boolean FirstLoad_d8 = true;
	Boolean FirstLoad_d10 = true;


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		String selectedChoice = getIntent().getExtras().getString("key");
		Log.i("DieRollerSelector", "BUM! Selected Choice = " + selectedChoice);	
		//Stop keyboard appearing on a view with scrollview
		getWindow().setSoftInputMode(
			    WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);
		
		super.onCreate(savedInstanceState);
		setContentView(R.layout.dieselector);
		
		ImageButton imageButtond4 = (ImageButton) findViewById(R.id.imageButtond4);
		imageButtond4.setOnClickListener((OnClickListener) this);			

		ImageButton imageButtond6 = (ImageButton) findViewById(R.id.imageButtond6);
		imageButtond6.setOnClickListener((OnClickListener) this);	

		ImageButton imageButtond8 = (ImageButton) findViewById(R.id.imageButtond8);
		imageButtond8.setOnClickListener((OnClickListener) this);	
		
		ImageButton imageButtond10 = (ImageButton) findViewById(R.id.imageButtond10);
		imageButtond10.setOnClickListener((OnClickListener) this);	
		
		ImageButton imageButtond12 = (ImageButton) findViewById(R.id.imageButtond12);
		imageButtond12.setOnClickListener((OnClickListener) this);	
		
		ImageButton imageButtond20 = (ImageButton) findViewById(R.id.imageButtond20);
		imageButtond20.setOnClickListener((OnClickListener) this);	
		
		ImageButton imageButtond100 = (ImageButton) findViewById(R.id.imageButtond100);
		imageButtond100.setOnClickListener((OnClickListener) this);	

		Button btnRoll = (Button) findViewById(R.id.btnRoll);
		btnRoll.setOnClickListener((OnClickListener) this);	
		Button btnReset = (Button) findViewById(R.id.btnReset);
		btnReset.setOnClickListener((OnClickListener) this);	
		
		//final Spinner spinner_d8 = (Spinner) findViewById(R.id.spinner_d8);
		//final Spinner spinner_d10 = (Spinner) findViewById(R.id.spinner_d10);

		//spinner_d8.setOnItemSelectedListener(this);
		//spinner_d10.setOnItemSelectedListener(this);

	}
							/*public void onItemSelected(AdapterView<?> parent, View view, int position,long arg3) 
					        {
					       
							editText1 = (EditText) findViewById(R.id.editText1);
							editText2 = (EditText) findViewById(R.id.editText2);
							editText3 = (EditText) findViewById(R.id.editText3);
							editText4 = (EditText) findViewById(R.id.editText4);
							editText5 = (EditText) findViewById(R.id.editText5);
							editText6 = (EditText) findViewById(R.id.editText6);
							editText7 = (EditText) findViewById(R.id.editText7);
					
					        int id = parent.getId();
					        switch (id) 
					        {
					            case R.id.spinner_d10:
					            // D10 Selected
					        	//Spinner returns selected on build and choice - this code only returns value on the user choice
						    	if(FirstLoad_d10){
						    		FirstLoad_d10 = false;
						    		return;            		
						    	}
					
						    	Spinner spinner_d10 = (Spinner) findViewById(R.id.spinner_d10);
						     	String SpinnerChoice_d10 = (String) spinner_d10.getItemAtPosition(position);          	
						     	editText4.setText(SpinnerChoice_d10);
						     	Toast.makeText(spinner_d10.getContext(), "You selected..." + SpinnerChoice_d10+"d10", Toast.LENGTH_LONG).show();
					            break;
					            
					            case R.id.spinner_d8:
					            // D8 Selected
					        	if(FirstLoad_d8){
						    		FirstLoad_d8 = false;
						    		return;            		
						    	}
						    	Spinner spinner_d8 = (Spinner) findViewById(R.id.spinner_d8);
						     	String SpinnerChoice_d8 = (String) spinner_d8.getItemAtPosition(position);          	
						     	editText3.setText(SpinnerChoice_d8);
						     	Toast.makeText(spinner_d8.getContext(), "You selected..." + SpinnerChoice_d8+"d8", Toast.LENGTH_LONG).show();
					            break;
					
					        }
						}*/

	public void onNothingSelected(AdapterView<?> arg0) {
		// TODO Auto-generated method stub
		
	}

	public void onClick(View v) {
		
		editText1 = (EditText) findViewById(R.id.editText1);
		editText2 = (EditText) findViewById(R.id.editText2);
		editText3 = (EditText) findViewById(R.id.editText3);
		editText4 = (EditText) findViewById(R.id.editText4);
		editText5 = (EditText) findViewById(R.id.editText5);
		editText6 = (EditText) findViewById(R.id.editText6);
		editText7 = (EditText) findViewById(R.id.editText7);
		Button btnRoll = (Button) findViewById(R.id.btnRoll);
		Button btnReset = (Button) findViewById(R.id.btnReset);
		
		Log.i("DieRollerSelector", "BUM! id pressed = " + v.getId());
		Log.i("DieRollerSelector", " --  id btnRoll = " + R.id.btnRoll);
		Log.i("DieRollerSelector", "BUM! id btnReset = " + R.id.btnReset);
		
		if (v.getId() == R.id.imageButtond4) {
			d4count = Integer.parseInt("0"+editText1.getText().toString());
			++d4count;
			editText1.setText(""+d4count);
		} else if (v.getId() == R.id.imageButtond6) {
			d6count = Integer.parseInt("0"+editText2.getText().toString());
			++d6count;
			editText2.setText(""+d6count);
		} else if (v.getId() == R.id.imageButtond8) {
			d8count = Integer.parseInt("0"+editText3.getText().toString());
			++d8count;
			editText3.setText(""+d8count);
		} else if (v.getId() == R.id.imageButtond10) {
			d10count = Integer.parseInt("0"+editText4.getText().toString());
			++d10count;
			editText4.setText(""+d10count);
		} else if (v.getId() == R.id.imageButtond12) {
			d12count = Integer.parseInt("0"+editText5.getText().toString());
			++d12count;
			editText5.setText(""+d12count);
		} else if (v.getId() == R.id.imageButtond20) {
			d20count = Integer.parseInt("0"+editText6.getText().toString());
			++d20count;
			editText6.setText(""+d20count);
		} else if (v.getId() == R.id.imageButtond100) {
			d100count = Integer.parseInt("0"+editText7.getText().toString());
			++d100count;
			editText7.setText(""+d100count);
		} else if (v.getId() == R.id.btnReset) {
			editText1.setText("");
			editText2.setText("");
			editText3.setText("");
			editText4.setText("");
			editText5.setText("");
			editText6.setText("");
			editText7.setText("");
		} else if (v.getId() == R.id.btnRoll){
			
			StringBuilder rollLog = calcDieTotals();
			
			showResults(rollLog);
		}
	}
	
	public StringBuilder calcDieTotals(){
	
		int rollResult = 0;
		int d4result = 0;
		int d6result = 0;
		int d8result = 0;
		int d10result = 0;
		int d12result = 0;
		int d20result = 0;
		int d100result = 0;

		Random myRandom = new Random();
		int d4 = 0;
		int d6 = 0;
		int d8 = 0;
		int d10 = 0;
		int d12 = 0;
		int d20 = 0;
		int d100 = 0;
		
		StringBuilder rollLog = new StringBuilder(100);

		d4count = Integer.parseInt("0"+editText1.getText().toString());
		d6count = Integer.parseInt("0"+editText2.getText().toString());
		d8count = Integer.parseInt("0"+editText3.getText().toString());
		d10count = Integer.parseInt("0"+editText4.getText().toString());
		d12count = Integer.parseInt("0"+editText5.getText().toString());
		d20count = Integer.parseInt("0"+editText6.getText().toString());
		d100count = Integer.parseInt("0"+editText7.getText().toString());
		
		//d4result = d4count * d4;

		if (d4count > 0) {
			rollLog.append("\n");
			rollLog.append("<b>"+d4count+"d4</b>: ");
			int limit = d4count;
			//Log.i("DieRollerSelector", " - d4 - no of dice:" +d4count );
			for (int i = 0; i < limit; i++) {
				//Log.i("DieRollerSelector", " - d4 - Loop_pos:" +i );
				int thisRoll = (myRandom.nextInt(4)+1);
				d4 += thisRoll;
				if(i < (limit-1)){
					rollLog.append(thisRoll+", ");
				} else {
					rollLog.append(thisRoll);
				}
			}
			rollLog.append(" = <b>("+d4+")</b><br>");
		}

		if (d6count > 0) {
			rollLog.append("\n");
			rollLog.append("<b>"+d6count+"d6</b>: ");
			int limit = d6count;
			
			for (int i = 0; i < limit; i++) { 
				int thisRoll = (myRandom.nextInt(6)+1);
				d6 += thisRoll;
				if(i < (limit-1)){
					rollLog.append(thisRoll+", ");
				} else {
					rollLog.append(thisRoll);
				}
			}
			rollLog.append(" = <b>("+d6+")</b><br>");
		}

		if (d8count > 0) {
			rollLog.append("\n");
			rollLog.append("<b>"+d8count+"d8</b>: ");
			int limit = d8count;
			
			for (int i = 0; i < limit; i++) { 
				int thisRoll = (myRandom.nextInt(8)+1);
				d8 += thisRoll;
				if(i < (limit-1)){
					rollLog.append(thisRoll+", ");
				} else {
					rollLog.append(thisRoll);
				}
			}				
			rollLog.append(" = <b>("+d8+")</b><br>");
		}

		if (d10count > 0) {
			rollLog.append("\n");
			rollLog.append("<b>"+d10count+"d10</b>: ");
			int limit = d10count;
			
			for (int i = 0; i < limit; i++) { 
				int thisRoll = (myRandom.nextInt(10)+1);
				d10 += thisRoll;
				if(i < (limit-1)){
					rollLog.append(thisRoll+", ");
				} else {
					rollLog.append(thisRoll);
				}
			}
			rollLog.append(" = <b>("+d10+")</b><br>");
		}

		if (d12count > 0) {
			rollLog.append("\n");
			rollLog.append("<b>"+d12count+"d12</b>: ");
			int limit = d12count;
			
			for (int i = 0; i < limit; i++) { 
				int thisRoll = (myRandom.nextInt(12)+1);
				d12 += thisRoll;
				if(i < (limit-1)){
					rollLog.append(thisRoll+", ");
				} else {
					rollLog.append(thisRoll);
				}
			}
			rollLog.append(" = <b>("+d12+")</b><br>");
		}

		if (d20count > 0) {
			rollLog.append("\n");
			rollLog.append("<b>"+d20count+"d20</b>: ");
			int limit = d20count;
			
			for (int i = 0; i < limit; i++) { 
				int thisRoll = (myRandom.nextInt(20)+1);
				d20 += thisRoll;
				if(i < (limit-1)){
					rollLog.append(thisRoll+", ");
				} else {
					rollLog.append(thisRoll);
				}
			}
			rollLog.append(" = <b>("+d20+")</b><br>");
		}

		if (d100count > 0) {
			rollLog.append("\n");
			rollLog.append("<b>"+d100count+"d100</b>: ");
			int limit = d100count;
			
			for (int i = 0; i < limit; i++) { 
				int thisRoll = (myRandom.nextInt(100)+1);
				d100 += thisRoll;
				if(i < (limit-1)){
					//rollLog.append(thisRoll+", ");
					if (thisRoll<10 ){
						rollLog.append("0"+thisRoll+", ");
					} else {
						rollLog.append(thisRoll+", ");
					}
				} else {
					//rollLog.append(thisRoll);
					if (thisRoll<10 ){
						rollLog.append("0"+thisRoll);
					} else {
						rollLog.append(thisRoll);
					}
				}
				
			}
			rollLog.append(" = <b>("+d100+")</b><br>");
			
		}	
		Log.i("DieRollerSelector", "BUM! rollLog = " + rollLog);
		int grandTotal = d4+d6+d8+d10+d12+d20+d100;
		if (grandTotal == 0){
			rollLog = null;
		}
		return rollLog;	
	}
	
	public void showResults(StringBuilder rollLog) {
		String myTitle = "";
		String myResults = "";
		if (rollLog == null){
			myTitle = "Critical Fail...";
			myResults = "...please choose some dice and press ROLL again!";
		} else {
			MediaPlayer mp = MediaPlayer.create(this, R.raw.roll_dice);
			mp.start();
			
			//Toast.makeText(btnRoll.getContext(), rollLog, Toast.LENGTH_LONG).show();
			rollLog.append("</font>");
			myTitle = "Results";
			myResults = rollLog.toString();
		}
		
		
		 AlertDialog alertDialog = new AlertDialog.Builder(this).create();  
		    alertDialog.setTitle(myTitle);  
		    alertDialog.setMessage(Html.fromHtml(myResults));  
		    alertDialog.setButton("DONE", new DialogInterface.OnClickListener() {  
		      public void onClick(DialogInterface dialog, int which) {  
		        return;  
		    } });
		    alertDialog.show();
	}
	
}
