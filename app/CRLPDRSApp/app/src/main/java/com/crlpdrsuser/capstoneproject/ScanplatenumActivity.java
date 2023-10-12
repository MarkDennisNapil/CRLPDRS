package com.crlpdrsuser.capstoneproject;

import androidx.appcompat.app.AppCompatActivity;
import androidx.annotation.*;
import androidx.appcompat.widget.Toolbar;
import androidx.coordinatorlayout.widget.CoordinatorLayout;
import com.google.android.material.appbar.AppBarLayout;
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
import android.webkit.WebView;
import android.webkit.WebSettings;
import android.content.Intent;
import android.net.Uri;
import android.provider.MediaStore;
import android.os.Build;
import androidx.core.content.FileProvider;
import java.io.File;
import android.view.View;
import com.google.android.gms.*;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.DialogFragment;
import androidx.core.content.ContextCompat;
import androidx.core.app.ActivityCompat;
import android.Manifest;
import android.content.pm.PackageManager;


public class ScanplatenumActivity extends  AppCompatActivity  { 
	
	public final int REQ_CD_CAM = 101;
	
	private Toolbar _toolbar;
	private AppBarLayout _app_bar;
	private CoordinatorLayout _coordinator;
	
	private ScrollView vscroll1;
	private LinearLayout linear1;
	private LinearLayout linearcam;
	private TextView etdetectedplatenum;
	private Button btngetplatenum;
	private TextView textview1;
	private ScrollView vscroll2;
	private LinearLayout linear2;
	private WebView webview2;
	private WebView webview1;
	
	private Intent cam = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
	private File _file_cam;
	private Intent send = new Intent();
	@Override
	protected void onCreate(Bundle _savedInstanceState) {
		super.onCreate(_savedInstanceState);
		setContentView(R.layout.scanplatenum);
		initialize(_savedInstanceState);
		if (ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA) == PackageManager.PERMISSION_DENIED
		|| ContextCompat.checkSelfPermission(this, Manifest.permission.READ_EXTERNAL_STORAGE) == PackageManager.PERMISSION_DENIED
		|| ContextCompat.checkSelfPermission(this, Manifest.permission.WRITE_EXTERNAL_STORAGE) == PackageManager.PERMISSION_DENIED) {
			ActivityCompat.requestPermissions(this, new String[] {Manifest.permission.CAMERA, Manifest.permission.READ_EXTERNAL_STORAGE, Manifest.permission.WRITE_EXTERNAL_STORAGE}, 1000);
		}
		else {
			initializeLogic();
		}
	}
	@Override
	public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {
		super.onRequestPermissionsResult(requestCode, permissions, grantResults);
		if (requestCode == 1000) {
			initializeLogic();
		}
	}
	
	private void initialize(Bundle _savedInstanceState) {
		
		_app_bar = (AppBarLayout) findViewById(R.id._app_bar);
		_coordinator = (CoordinatorLayout) findViewById(R.id._coordinator);
		_toolbar = (Toolbar) findViewById(R.id._toolbar);
		setSupportActionBar(_toolbar);
		getSupportActionBar().setDisplayHomeAsUpEnabled(true);
		getSupportActionBar().setHomeButtonEnabled(true);
		_toolbar.setNavigationOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _v) {
				onBackPressed();
			}
		});
		vscroll1 = (ScrollView) findViewById(R.id.vscroll1);
		linear1 = (LinearLayout) findViewById(R.id.linear1);
		linearcam = (LinearLayout) findViewById(R.id.linearcam);
		etdetectedplatenum = (TextView) findViewById(R.id.etdetectedplatenum);
		btngetplatenum = (Button) findViewById(R.id.btngetplatenum);
		textview1 = (TextView) findViewById(R.id.textview1);
		vscroll2 = (ScrollView) findViewById(R.id.vscroll2);
		linear2 = (LinearLayout) findViewById(R.id.linear2);
		webview2 = (WebView) findViewById(R.id.webview2);
		webview2.getSettings().setJavaScriptEnabled(true);
		webview2.getSettings().setSupportZoom(true);
		webview1 = (WebView) findViewById(R.id.webview1);
		webview1.getSettings().setJavaScriptEnabled(true);
		webview1.getSettings().setSupportZoom(true);
		_file_cam = FileUtil.createNewPictureFile(getApplicationContext());
		Uri _uri_cam = null;
		if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.N) {
			_uri_cam= FileProvider.getUriForFile(getApplicationContext(), getApplicationContext().getPackageName() + ".provider", _file_cam);
		}
		else {
			_uri_cam = Uri.fromFile(_file_cam);
		}
		cam.putExtra(MediaStore.EXTRA_OUTPUT, _uri_cam);
		cam.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);
		
		linear1.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				webview2.loadUrl("https://crlpdrscapstoneproject.000webhostapp.com/verifystatus.php?platenum=".concat(""));
				webview1.loadUrl("https://crlpdrscapstoneproject.000webhostapp.com/platenumsearch.php?platenum=".concat(""));
			}
		});
		
		etdetectedplatenum.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				
			}
		});
		
		btngetplatenum.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				send.setClass(getApplicationContext(), ScanresultActivity.class);
				send.putExtra("platenum", "");
				startActivity(send);
			}
		});
		
		webview2.setWebViewClient(new WebViewClient() {
			@Override
			public void onPageStarted(WebView _param1, String _param2, Bitmap _param3) {
				final String _url = _param2;
				
				super.onPageStarted(_param1, _param2, _param3);
			}
			
			@Override
			public void onPageFinished(WebView _param1, String _param2) {
				final String _url = _param2;
				
				super.onPageFinished(_param1, _param2);
			}
		});
		
		webview1.setWebViewClient(new WebViewClient() {
			@Override
			public void onPageStarted(WebView _param1, String _param2, Bitmap _param3) {
				final String _url = _param2;
				
				super.onPageStarted(_param1, _param2, _param3);
			}
			
			@Override
			public void onPageFinished(WebView _param1, String _param2) {
				final String _url = _param2;
				
				super.onPageFinished(_param1, _param2);
			}
		});
	}
	
	private void initializeLogic() {
		cameraView = new SurfaceView(this);
		linearcam.addView(cameraView);
		_text_detector();
	}
	
	@Override
	protected void onActivityResult(int _requestCode, int _resultCode, Intent _data) {
		
		super.onActivityResult(_requestCode, _resultCode, _data);
		
		switch (_requestCode) {
			
			default:
			break;
		}
	}
	
	public void _location_variable () {
	}
	
	com.google.android.gms.vision.CameraSource cameraSource;
	SurfaceView cameraView;
	
	{
	}
	
	
	public void _text_detector () {
		com.google.android.gms.vision.text.TextRecognizer textRecognizer = new com.google.android.gms.vision.text.TextRecognizer.Builder(getApplicationContext()).build();
		if (!textRecognizer.isOperational()) {
			android.util.Log.w("MainActivity", "Detector dependencies are not yet available");
		} else {
			cameraSource = new com.google.android.gms.vision.CameraSource.Builder(getApplicationContext(), textRecognizer)
			.setFacing(com.google.android.gms.vision.CameraSource.CAMERA_FACING_BACK)
			.setRequestedPreviewSize(300, 1200)
			.setRequestedFps(2.0f)
			.setAutoFocusEnabled(true)
			.build();
		}
		cameraView.getHolder().addCallback(new SurfaceHolder.Callback() {
			@Override
			public void surfaceCreated(SurfaceHolder surfaceHolder) {
				try {
					cameraSource.start(cameraView.getHolder());
				} catch (java.io.IOException e) {
					e.printStackTrace();
				}
			}
			
			@Override
			public void surfaceChanged(SurfaceHolder surfaceHolder, int i, int i1, int i2) {}
			
			@Override
			public void surfaceDestroyed(SurfaceHolder surfaceHolder) {
				cameraSource.stop();
			}
		});
		textRecognizer.setProcessor(new com.google.android.gms.vision.Detector.Processor<com.google.android.gms.vision.text.TextBlock>() {
			@Override
			public void release() {
			}
			
			@Override
			public void receiveDetections(com.google.android.gms.vision.Detector.Detections<com.google.android.gms.vision.text.TextBlock> detections) {
				final SparseArray<com.google.android.gms.vision.text.TextBlock> items = detections.getDetectedItems();
				if(items.size() != 0)
				{
					etdetectedplatenum.post(new Runnable() {
						@Override
						public void run() {
							StringBuilder stringBuilder = new StringBuilder();
							for(int i =0;i<items.size();++i)
							{
								com.google.android.gms.vision.text.TextBlock item = items.valueAt(i);
								stringBuilder.append(item.getValue());
								stringBuilder.append("\n");
							}
							etdetectedplatenum.setText(stringBuilder.toString());
						}
					});
				}
			}
		});
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