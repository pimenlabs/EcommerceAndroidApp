package com.solodroid.ecommerce;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.view.Window;

public class ActivitySplash extends Activity {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        //hide titlebar on acitivity
        getWindow().requestFeature(Window.FEATURE_NO_TITLE);
           
        /** Sets a layout for this activity */
        setContentView(R.layout.splash);
        
        //Creates a count down timer, which will be expired after 5000 milliseconds     
        new CountDownTimer(5000,1000) {        	
        	
        	//This method will be invoked on finishing or expiring the timer
			@Override
			public void onFinish() {
				//Creates an intent to start new activity
				Intent intent = new Intent(getBaseContext(), MainActivity.class);
				
				// memulai activity baru ketika waktu timer habis
				startActivity(intent);
				
				//menutup layar activity
				finish();
				
			}

			//This method will be invoked in every 1000 milli seconds until 
			//this timer is expired.Because we specified 1000 as tick time 
			//while creating this CountDownTimer
			@Override
			public void onTick(long millisUntilFinished) {
								
			}
		}.start();
        
    }
}