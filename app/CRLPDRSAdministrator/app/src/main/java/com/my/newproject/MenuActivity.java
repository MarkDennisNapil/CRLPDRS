package com.my.newproject;

import android.app.Activity;
import android.app.*;
import android.os.*;
import android.view.*;
import android.view.View.*;
import android.widget.*;
import android.content.*;
import android.content.res.*;
import android.graphics.*;
import android.graphics.drawable.*;
import android.media.*;
import android.net.*;
import android.text.*;
import android.text.style.*;
import android.util.*;
import android.webkit.*;
import android.animation.*;
import android.view.animation.*;
import java.util.*;
import java.util.regex.*;
import java.text.*;
import org.json.*;
import android.widget.ScrollView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Button;
import android.content.Intent;
import android.net.Uri;
import android.view.View;
import android.app.Fragment;
import android.app.FragmentManager;
import android.app.DialogFragment;


public class MenuActivity extends  Activity { 
	
	
	private ScrollView vscroll1;
	private LinearLayout linear1;
	private TextView textview1;
	private Button btnregvehicle;
	private Button btnregadmin;
	private Button btnusermanagement;
	private Button btnvandmloststolen;
	
	private Intent regvehicle = new Intent();
	private Intent regadmin = new Intent();
	private Intent usermanagement = new Intent();
	private Intent vandmloststolen = new Intent();
	@Override
	protected void onCreate(Bundle _savedInstanceState) {
		super.onCreate(_savedInstanceState);
		setContentView(R.layout.menu);
		initialize(_savedInstanceState);
		initializeLogic();
	}
	
	private void initialize(Bundle _savedInstanceState) {
		
		vscroll1 = (ScrollView) findViewById(R.id.vscroll1);
		linear1 = (LinearLayout) findViewById(R.id.linear1);
		textview1 = (TextView) findViewById(R.id.textview1);
		btnregvehicle = (Button) findViewById(R.id.btnregvehicle);
		btnregadmin = (Button) findViewById(R.id.btnregadmin);
		btnusermanagement = (Button) findViewById(R.id.btnusermanagement);
		btnvandmloststolen = (Button) findViewById(R.id.btnvandmloststolen);
		
		btnregvehicle.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				regvehicle.setClass(getApplicationContext(), RegvehicleActivity.class);
				startActivity(regvehicle);
			}
		});
		
		btnregadmin.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				regadmin.setClass(getApplicationContext(), RegadminActivity.class);
				startActivity(regadmin);
			}
		});
		
		btnusermanagement.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				usermanagement.setClass(getApplicationContext(), UsermanagementActivity.class);
				startActivity(usermanagement);
			}
		});
		
		btnvandmloststolen.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				vandmloststolen.setClass(getApplicationContext(), VandmloststolenActivity.class);
				startActivity(vandmloststolen);
			}
		});
	}
	
	private void initializeLogic() {
	}
	
	@Override
	protected void onActivityResult(int _requestCode, int _resultCode, Intent _data) {
		
		super.onActivityResult(_requestCode, _resultCode, _data);
		
		switch (_requestCode) {
			
			default:
			break;
		}
	}
	
	@Deprecated
	public void showMessage(String _s) {
		Toast.makeText(getApplicationContext(), _s, Toast.LENGTH_SHORT).show();
	}
	
	@Deprecated
	public int getLocationX(View _v) {
		int _location[] = new int[2];
		_v.getLocationInWindow(_location);
		return _location[0];
	}
	
	@Deprecated
	public int getLocationY(View _v) {
		int _location[] = new int[2];
		_v.getLocationInWindow(_location);
		return _location[1];
	}
	
	@Deprecated
	public int getRandom(int _min, int _max) {
		Random random = new Random();
		return random.nextInt(_max - _min + 1) + _min;
	}
	
	@Deprecated
	public ArrayList<Double> getCheckedItemPositionsToArray(ListView _list) {
		ArrayList<Double> _result = new ArrayList<Double>();
		SparseBooleanArray _arr = _list.getCheckedItemPositions();
		for (int _iIdx = 0; _iIdx < _arr.size(); _iIdx++) {
			if (_arr.valueAt(_iIdx))
			_result.add((double)_arr.keyAt(_iIdx));
		}
		return _result;
	}
	
	@Deprecated
	public float getDip(int _input){
		return TypedValue.applyDimension(TypedValue.COMPLEX_UNIT_DIP, _input, getResources().getDisplayMetrics());
	}
	
	@Deprecated
	public int getDisplayWidthPixels(){
		return getResources().getDisplayMetrics().widthPixels;
	}
	
	@Deprecated
	public int getDisplayHeightPixels(){
		return getResources().getDisplayMetrics().heightPixels;
	}
	
}