package uk.co.simongoldie.dieroller;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.Spinner;

public class DieRollerMainActivity extends Activity implements OnClickListener{
    /** Called when the activity is first created. */
	
	Spinner spinner1;
	String selectedChoice;
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        
        Button gochoice = (Button) findViewById(R.id.button1);
        gochoice.setOnClickListener((OnClickListener) this);
    }

	public void onClick(View v) {
		Spinner spinner1 = (Spinner) findViewById(R.id.spinner1);
		selectedChoice = (String) spinner1.getSelectedItem(); 
		Log.i("DieRollerMainActivity", "BUM! onClick Selected Choice = " + selectedChoice);
		if (selectedChoice.equals("RPG Dice")) {
			Log.i("DieRollerMainActivity", "LAUNCHING RPG Dice (DieRollerSelector)");
		    Intent intent = new Intent(DieRollerMainActivity.this, DieRollerSelector.class);
			intent.putExtra("key", selectedChoice);
			startActivity(intent);
		} else if(selectedChoice.equals("Poker Dice")) {
			Log.i("DieRollerMainActivity", "LAUNCHING Poker Dice (PokerDiceActivity)");
			Intent intent = new Intent(DieRollerMainActivity.this, PokerDiceActivity.class);
			intent.putExtra("key", selectedChoice);
			startActivity(intent);
		}

		//intent.putExtra("key", selectedChoice);
		//startActivity(intent);
	}
}
