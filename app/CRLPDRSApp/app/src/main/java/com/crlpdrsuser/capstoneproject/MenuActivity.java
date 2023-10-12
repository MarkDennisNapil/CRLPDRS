package com.crlpdrsuser.capstoneproject;

import androidx.appcompat.app.AppCompatActivity;
import androidx.annotation.*;
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
import android.widget.ImageView;
import de.hdodenhof.circleimageview.*;
import android.widget.TextView;
import android.content.Intent;
import android.net.Uri;
import android.view.View;
import com.google.android.gms.*;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.DialogFragment;


public class MenuActivity extends  AppCompatActivity  { 
	
	
	private ScrollView vscroll1;
	private LinearLayout linear1;
	private LinearLayout linear2;
	private ImageView imsettings;
	private CircleImageView imscanplatenum;
	private CircleImageView imreport;
	private CircleImageView imloststolen;
	private CircleImageView imsafetyinfo;
	private TextView textview4;
	
	private Intent scanplatenum = new Intent();
	private Intent myvehicle = new Intent();
	private Intent loststolen = new Intent();
	private Intent safetyinfo = new Intent();
	private Intent settings = new Intent();
	private Intent report = new Intent();
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
		linear2 = (LinearLayout) findViewById(R.id.linear2);
		imsettings = (ImageView) findViewById(R.id.imsettings);
		imscanplatenum = (CircleImageView) findViewById(R.id.imscanplatenum);
		imreport = (CircleImageView) findViewById(R.id.imreport);
		imloststolen = (CircleImageView) findViewById(R.id.imloststolen);
		imsafetyinfo = (CircleImageView) findViewById(R.id.imsafetyinfo);
		textview4 = (TextView) findViewById(R.id.textview4);
		
		imsettings.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				settings.setClass(getApplicationContext(), SettingsActivity.class);
				startActivity(settings);
			}
		});
		
		imscanplatenum.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				scanplatenum.setClass(getApplicationContext(), ScanplatenumActivity.class);
				startActivity(scanplatenum);
			}
		});
		
		imreport.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				report.setClass(getApplicationContext(), ReportActivity.class);
				startActivity(report);
			}
		});
		
		imloststolen.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				loststolen.setClass(getApplicationContext(), LoststolenlistActivity.class);
				startActivity(loststolen);
			}
		});
		
		imsafetyinfo.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				safetyinfo.setClass(getApplicationContext(), SafetyinfoActivity.class);
				startActivity(safetyinfo);
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