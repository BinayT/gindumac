import './App.css';
import { Switch, BrowserRouter as Router, Route } from 'react-router-dom';

import HomePage from './components/HomePage/Home';

function App() {
  return (
    <div className='App'>
      <Router>
        <Switch>
          <Route path='/' component={HomePage} />
        </Switch>
      </Router>
    </div>
  );
}

export default App;
