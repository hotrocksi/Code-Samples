package uk.co.simongoldie.dieroller;

import java.util.Random;

import uk.co.simongoldie.dieroller.R.drawable;
import android.app.Activity;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.media.MediaPlayer;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.ImageButton;

public class PokerDiceActivity extends Activity implements OnClickListener{

    String diceFace[] = {"9", "10", "Jack", "Queen", "King", "Ace"};  
	int heldDice[] = {0, 0, 0, 0, 0};
	String playerHand[] = {"10", "Jack", "Queen", "King", "Ace"};
    int throwNum = 0;
    
    int rolledButton[] = {R.id.ImageButton06, R.id.ImageButton07, R.id.ImageButton08, R.id.ImageButton09, R.id.ImageButton10};
    
    private int[] diceFacePic = {
    		R.drawable.pd_9,
    		R.drawable.pd_10,
    		R.drawable.pd_jack,
    		R.drawable.pd_queen,
    		R.drawable.pd_king,
    		R.drawable.pd_ace,
    		R.drawable.pd_9_h,
    		R.drawable.pd_10_h,
    		R.drawable.pd_jack_h,
    		R.drawable.pd_queen_h,
    		R.drawable.pd_king_h,
    		R.drawable.pd_ace_h
    		};

    
	//POKER DICE
	/*
	array dice[]
	array hold[] = 0,0,0,0,0
	throw=0
	roll all six dice
	for i=0; i<5;i++
		dice[i] = rnd(6)
	next
	//REPEAT
	++throw
	display dice 1 - 6

	onclick
		case x
			hold[x] = 1
			for i=1-6
				if hold[i] = 0
					dice[i] = rnd(6)

	goto Repeat*/

	
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.pokerdice);

        //Log.i("PokerDiceActivity", "Start of onCreate");
        Button btnRoll = (Button) findViewById(R.id.btnRoll);
		btnRoll.setOnClickListener((OnClickListener) this);	
		Button btnReset = (Button) findViewById(R.id.btnReset);
		btnReset.setOnClickListener((OnClickListener) this);
		
		ImageButton ImageButton06 = (ImageButton) findViewById(R.id.ImageButton06);
		ImageButton06.setOnClickListener((OnClickListener) this);
		ImageButton ImageButton07 = (ImageButton) findViewById(R.id.ImageButton07);
		ImageButton07.setOnClickListener((OnClickListener) this);
		ImageButton ImageButton08 = (ImageButton) findViewById(R.id.ImageButton08);
		ImageButton08.setOnClickListener((OnClickListener) this);
		ImageButton ImageButton09 = (ImageButton) findViewById(R.id.ImageButton09);
		ImageButton09.setOnClickListener((OnClickListener) this);
		ImageButton ImageButton10 = (ImageButton) findViewById(R.id.ImageButton10);
		ImageButton10.setOnClickListener((OnClickListener) this);
		//Log.i("PokerDiceActivity", "end of onCreate");
    }
	
	public void onClick(View v) {

		/*for (int i = 0; i < playerHand.length; i++) {
			Log.i("PokerDiceActivity", "ph: " + playerHand[i].toString());
		}*/
		
		if (v.getId() == R.id.btnReset) {
			//reset player dice
		} else if (v.getId() == R.id.btnRoll){
			//Roll Dice
			//for (int i = 0; i < 3; i++) {
				MediaPlayer mp = MediaPlayer.create(this, R.raw.roll_dice);
				mp.start();
				rollPokerDie();
				setPokerDiePics();
			//}
		} else if (v.getId() == R.id.ImageButton06){
			//first dice
			holdPokerDie(0);
			//ImageButton06.setImageResource(R.drawable.pd_ace); 

		} else if (v.getId() == R.id.ImageButton07){
			//second dice
			holdPokerDie(1);
		} else if (v.getId() == R.id.ImageButton08){
			//third dice
			holdPokerDie(2);
		} else if (v.getId() == R.id.ImageButton09){
			//forth dice
			holdPokerDie(3);
		} else if (v.getId() == R.id.ImageButton10){
			//fifth dice
			holdPokerDie(4);
		}
		//Go update the dice pictures
		
	}
	
	public void holdPokerDie(int dieNum){
		if (heldDice[dieNum] == 1){
			heldDice[dieNum] = 0;
		} else {
			heldDice[dieNum] = 1;
		}
		setPokerDiePics();
	}
	
	public void setPokerDiePics() {
		//code here
		int heldPic = 0;
		ImageButton ImageButton06 = (ImageButton) findViewById(R.id.ImageButton06);
		ImageButton ImageButton07 = (ImageButton) findViewById(R.id.ImageButton07);
		ImageButton ImageButton08 = (ImageButton) findViewById(R.id.ImageButton08);
		ImageButton ImageButton09 = (ImageButton) findViewById(R.id.ImageButton09);
		ImageButton ImageButton10 = (ImageButton) findViewById(R.id.ImageButton10);
	    
		//for each dice in players hand roll 
		
		for (int i = 0; i < playerHand.length; i++) {
		
			for (int x= 0; x < diceFace.length; x++) {
				//if(held)
				heldPic = x;

				
				Log.i("PokerDiceActivity", "dice pos: " + i + "dice value: " + diceFace[x] + "heldPic: " + heldPic);
				
				if(playerHand[i].equals(diceFace[x])){
					Log.i("PokerDiceActivity", "Pos:"+i+", match:"+playerHand[i]+" / "+diceFace[x]);
					switch(i)
					{
					case 0:
						if (heldDice[i] == 0){
							heldPic = x;
						} else {
							heldPic = x+6;
						}
						Log.i("PokerDiceActivity", "setting ImageButton06 to ");
						ImageButton06.setImageResource(diceFacePic[heldPic]);
						break;
					case 1:
						if (heldDice[i] == 0){
							heldPic = x;
						} else {
							heldPic = x+6;
						}
						Log.i("PokerDiceActivity", "setting ImageButton07");
						ImageButton07.setImageResource(diceFacePic[heldPic]);
						break;
					case 2:
						if (heldDice[i] == 0){
							heldPic = x;
						} else {
							heldPic = x+6;
						}
						Log.i("PokerDiceActivity", "setting ImageButton08");
						ImageButton08.setImageResource(diceFacePic[heldPic]);
						break;
					case 3:
						if (heldDice[i] == 0){
							heldPic = x;
						} else {
							heldPic = x+6;
						}
						Log.i("PokerDiceActivity", "setting ImageButton09");
						ImageButton09.setImageResource(diceFacePic[heldPic]);
						break;
					case 4:
						if (heldDice[i] == 0){
							heldPic = x;
						} else {
							heldPic = x+6;
						}
						Log.i("PokerDiceActivity", "setting ImageButton10");
						ImageButton10.setImageResource(diceFacePic[heldPic]);
						break;
					}
				}

			}
		}
		
	}
	
	public void rollPokerDie (){
		//Roll dice
		//Setup Random function
		Random myRandom = new Random();
		++throwNum;
		Log.i("PokerDiceActivity", "Throw #: " + throwNum);
		
		Log.i("PokerDiceActivity", "Player Dice: ");
		for (int ph = 0; ph < playerHand.length; ph++) {
			Log.i("PokerDiceActivity", ": " + playerHand[ph].toString());
		}
		
		Log.i("PokerDiceActivity", "Dice Held: " + heldDice);
		for (int i = 0; i < heldDice.length; i++) {
			Log.i("PokerDiceActivity", ": " + heldDice[i]);
		}
		
		//for each dice in players hand roll dice
		for (int i = 0; i < playerHand.length; i++) {
			//if player has held this dice skip this, else continue
			if(heldDice[i] == 0) {
				//Roll dice (d6)
				int thisRoll = (myRandom.nextInt(6));
				Log.i("PokerDiceActivity", "rolled: " + thisRoll + ", Dice #" + i + " = "+diceFace[thisRoll].toString());
				//update this dice with one rolled (using array of sides lookup)
				playerHand[i] = diceFace[thisRoll].toString();
			}
		}
		
		Log.i("PokerDiceActivity", "Player Final Dice (after "+throwNum+" throw):");
		for (int i = 0; i < playerHand.length; i++) {
			Log.i("PokerDiceActivity", ": " + playerHand[i].toString());
		}
	}
}
